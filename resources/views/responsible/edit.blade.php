@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('responsible.update', $responsible) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Editar dados do responsável do(a) discente: <b>{{ $responsible->registrations[0]->student->person->name }}</b></div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name1">Nome do Responsável<span class="span-red">*</span></label>
                                    <input class="form-control form-control-rounded" id="name1" name="name1" type="text" value="{{ $responsible->person->name }}" autofocus
                                        placeholder="Digite o nome do responsável" required
                                        value="{{ old('name1') }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo Nome do Responsável não pode ser vazio!
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="kinship">Grau de Parentesco</label>
                                    <input class="form-control form-control-rounded" id="kinship" name="kinship"
                                        type="text" value="{{ $responsible->kinship }}"
                                        placeholder="Digite o Grau de Parentesco do responsável para com o Aluno" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="cpf1">CPF do Responsável<span class="span-red">*</span></label>
                                    <input class="form-control form-control-rounded" id="cpf1" name="cpf1" type="text"
                                        placeholder="Digite o CPF do Responsável" value="{{ $responsible->person->cpf }}" required />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo CPF do Responsável não pode ser vazio!
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="rg1">RG do Responsável<span class="span-red">*</span></label>
                                            <input class="form-control form-control-rounded" id="rg1" name="rg1"
                                                type="text" placeholder="Digite o RG do Responsável" required
                                                value="{{$responsible->person->rg }}" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo RG do Responsável não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="emitter_rg1">Órgão Emissor<span class="span-red">*</span></label>
                                            <input class="form-control form-control-rounded" id="emitter_rg1"
                                                name="emitter_rg1" type="text" value="{{ $responsible->person->emitter_rg }}" required
                                                placeholder="Digite o Órgão Emissor do RG do Responsável" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Órgão Emissor não pode ser vazio!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="family_bag">Possui Bolsa Família<span class="span-red">*</span></label>
                                    <select class="form-control form-control-rounded" name="family_bag" id="family_bag" required>
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="0"
                                            @if($responsible->family_bag=="0")
                                                selected
                                            @endif
                                        >Não</option>
                                        <option value="1"
                                             @if($responsible->family_bag=="1")
                                                selected
                                            @endif
                                        >Sim</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo Possui Bolsa Família não pode ser vazio!
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="phone3">Número de telefone<span class="span-red">*</span></label>
                                            <input class="form-control form-control-rounded" id="phone3" name="phone3"
                                                type="text" placeholder="Digite o Número de telefone do Reponsável"
                                                required value="{{ $responsible->person->phone1 }}" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Número de telefone não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="phone4">Número de telefone secundário</label>
                                            <input class="form-control form-control-rounded" id="phone4" name="phone4"
                                                type="text" placeholder="Digite o número de telefone do reponsável"
                                                value="{{$responsible->person->phone2 }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="nis1">NIS do Responsável</label>
                                    <input class="form-control form-control-rounded" id="nis1" name="nis1" type="text"
                                        placeholder="Digite o NIS do Responsável" value="{{ $responsible->person->nis }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="parents_divorced">Os pais são divorciados?</label>
                                            <select class="form-control form-control-rounded" name="parents_divorced" id="parents_divorced">
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="0"
                                                    @if($responsible->registrations[0]->parents_divorced=="0")
                                                        selected
                                                    @endif
                                                >Não</option>
                                                <option value="1"
                                                    @if($responsible->registrations[0]->parents_divorced=="1")
                                                        selected
                                                    @endif
                                                >Sim</option>
                                            </select>
                                        </div>

                                        <div class="col-9 form-group">
                                            <label for="student_custody">Caso sejam divorciados, quem pussui a guarda do Aluno</label>
                                            <input class="form-control form-control-rounded" id="student_custody"
                                                name="student_custody" type="text" value="{{ $responsible->registrations[0]->student_custody }}"
                                                placeholder="Digite o Nome da pessoa que possui a guarda do Aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="guard_document">O responsável apresentou documentos comprobatórios da guarda?</label>
                                    <select class="form-control form-control-rounded" name="guard_document" id="guard_document">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="0"
                                            @if($responsible->registrations[0]->guard_document=="0")
                                                selected
                                            @endif
                                        >Não</option>
                                        <option value="1"
                                            @if($responsible->registrations[0]->guard_document=="1")
                                                selected
                                            @endif
                                        >Sim</option>
                                    </select>
                                </div>

                                 <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="phone3"><b>Ano da Matrícula referente a </b></label>
                                            <input class="form-control form-control-rounded" id="phone3" disabled
                                                type="text" value="{{$responsible->registrations[0]->dateFormatYear()}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('responsible.create',$responsible->registrations[0])}}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
