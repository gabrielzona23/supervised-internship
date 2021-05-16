@extends('layouts.home')

@section('content')
<div class="col-md-12">
    <div class="card text-left">
        <div class="card-body">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Vizualização dos dados do responsável do(a) discente: <b>{{ $responsible->registrations[0]->student->person->name }}</b></div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name1">Nome do Responsável</label>
                                <input class="form-control form-control-rounded" id="name1" type="text" value="{{ $responsible->person->name }}" disabled/>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="kinship">Grau de Parentesco</label>
                                <input class="form-control form-control-rounded" id="kinship" name="kinship"
                                    type="text" value="{{ $responsible->kinship }}" disabled placeholder="dado não cadastrado"/>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="cpf1">CPF do Responsável</label>
                                <input class="form-control form-control-rounded" id="cpf1" name="cpf1" type="text" disabled
                                    placeholder="dado não cadastrado" value="{{ $responsible->person->cpf }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="rg1">RG do Responsável</label>
                                        <input class="form-control form-control-rounded" id="rg1"
                                            type="text" placeholder="Digite o RG do Responsável" disabled
                                            value="{{$responsible->person->rg }}" />
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="emitter_rg1">Órgão Emissor</label>
                                        <input class="form-control form-control-rounded" id="emitter_rg1" type="text" value="{{ $responsible->person->emitter_rg }}" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="family_bag">Possui Bolsa Família</label>
                                <select class="form-control form-control-rounded" name="family_bag" id="family_bag" disabled>
                                    <option value="" selected disabled>----dado não cadastrado----</option>
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
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="phone3">Número de telefone</label>
                                        <input class="form-control form-control-rounded" id="phone3"
                                            type="text" disabled value="{{ $responsible->person->phone1 }}" />
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="phone4">Número de telefone secundário</label>
                                        <input class="form-control form-control-rounded" id="phone4"
                                            type="text" placeholder="dado não cadastrado" disabled
                                            value="{{$responsible->person->phone2 }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="nis1">NIS do Responsável</label>
                                <input class="form-control form-control-rounded" id="nis1" type="text"
                                    placeholder="dado não cadastrado" value="{{ $responsible->person->nis }}" disabled/>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <div class="row">
                                    <div class="col-3 form-group">
                                        <label for="parents_divorced">Os pais são divorciados?</label>
                                        <select class="form-control form-control-rounded" id="parents_divorced" disabled>
                                            <option value="" selected disabled>----Nenhum dado cadastrado----</option>
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
                                        <input class="form-control form-control-rounded" id="student_custody" disabled
                                            type="text" placeholder="dado não cadastrado" value="{{ $responsible->registrations[0]->student_custody }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="guard_document">O responsável apresentou documentos comprobatórios da guarda?</label>
                                <select class="form-control form-control-rounded" disabled id="guard_document">
                                    <option value="" selected disabled>---dado não cadastrado"----</option>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{url()->previous()}}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
