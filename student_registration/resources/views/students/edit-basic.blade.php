@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('students.update', $student) }}" class="needs-validation"
            novalidate="novalidate">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-3">Edição das informações de identificação do Aluno(a): <b>{{ $student->person->name }}</b> </h4>
                <div class="separator-breadcrumb border-top"></div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name">Nome do aluno(a)*</label>
                                    <input class="form-control form-control-rounded" id="name" name="name" required
                                        type="text" placeholder="Digite o nome do aluno(a)"
                                        value="{{ $student->person->name }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="born_date">Data de nascimento do aluno*</label>
                                            <input class="form-control form-control-rounded" id="born_date"
                                                name="born_date" value="{{$student->born_date}}" type="date" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="cpf">CPF de aluno</label>
                                            <input class="form-control form-control-rounded" id="cpf" name="cpf"
                                                type="text" value="{{ $student->person->cpf }}"
                                                placeholder="Digite o CPF do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="born_state">Estado onde o aluno nasceu*</label>
                                    <input class="form-control form-control-rounded" id="born_state" type="text"
                                        required name="born_state" value="{{ $student->person->born_state }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="rg">RG do Aluno</label>
                                            <input class="form-control form-control-rounded" id="rg" name="rg"
                                                value="{{ $student->person->rg}}" type="text"
                                                placeholder="Digite o RG do aluno" />
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="emitter_rg">Órgão do emissor</label>
                                            <input class="form-control form-control-rounded" id="emitter_rg"
                                                value="{{ $student->person->emitter_rg}}" name="emitter_rg" type="text"
                                                placeholder="Digite o órgão emissor do RG do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="nationality">Nacionalidade*</label>
                                            <input class="form-control form-control-rounded" id="nationality"
                                                name="nationality" type="text" required
                                                value="{{ $student->nationality }}" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="born_city">Naturalidade*</label>
                                            <input class="form-control form-control-rounded" id="born_city"
                                                name="born_city" value="{{ $student->person->born_city }}" type="text"
                                                placeholder="Digite a cidade em que o aluno nasceu" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="phone1">Número de telefone principal*</label>
                                            <input class="form-control form-control-rounded" id="phone1" name="phone1"
                                                value="{{ $student->person->phone1 }}" type="text" required
                                                placeholder="Digite o número de telefone" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="phone2">Número de telefone secundário</label>
                                            <input class="form-control form-control-rounded" id="phone2" name="phone2"
                                                value="{{ $student->person->phone2 }}" type="text"
                                                placeholder="Digite o número de telefone secundário" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="number_car_sus">Número do cartão do sus</label>
                                            <input class="form-control form-control-rounded" id="number_card_sus"
                                                value="{{ $student->number_card_sus }}" name="number_card_sus"
                                                type="text" placeholder="Digite o número do cartão do sus" />
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="inep_code">Código INEP</label>
                                            <input class="form-control form-control-rounded" id="inep_code"
                                                name="inep_code" value="{{ $student->inep_code }}" type="text"
                                                placeholder="Digite o código do inep do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="job">Profissão</label>
                                            <input class="form-control form-control-rounded" id="job" name="job"
                                                type="text" value="{{ $student->person->job->name }}" />
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="nis">NIS do Aluno</label>
                                            <input class="form-control form-control-rounded" id="nis" name="nis"
                                                type="text" value="{{ $student->person->nis }}"
                                                placeholder="Digite o nis do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="programs">Programas*</label>
                                            <select class="form-control form-control-rounded" id="programs"
                                                name="programs" required>
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="0">Nenhum</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}"
                                                    @if($programsStudent->id==$program->id)
                                                        selected
                                                    @endif
                                                    >{{ $program->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="has_special_needs">Possui Necessidades Educacionais
                                                Especiais*</label>
                                            <select class="form-control form-control-rounded" name="has_special_needs"
                                                id="has_special_needs" required>
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value=0 @if(old('has_special_needs')==0 ||$student->has_special_needs==0 )
                                                    selected @endif >Não
                                                </option>
                                                <option value=1 @if(old('has_special_needs')==1||$student->
                                                    has_special_needs==1 )
                                                    selected @endif>Sim
                                                </option>
                                            </select>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="special_educational_needs">Necessidades Especiais</label>
                                    <input class="form-control form-control-rounded" id="special_educational_needs"
                                        name="special_educational_needs" type="text"
                                        placeholder="Digite as necssidades educacionais do aluno"
                                        value="{{ $student->special_educational_needs }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label for="color">Cor</label>
                                            <input class="form-control form-control-rounded" type="text" name="color"
                                                id="color" placeholder="Digite a Cor do aluno"
                                                value="{{ $student->color }}" />
                                        </div>

                                        <div class="col-4 form-group">
                                            <label for="breed">Raça</label>
                                            <input class="form-control form-control-rounded" type="text" id="breed"
                                                placeholder="Digite a Raça do aluno" name="breed"
                                                value="{{ $student->breed}}" />
                                        </div>

                                        <div class="col-4 form-group">
                                            <label for="gender">Gênero</label>
                                            <input class="form-control form-control-rounded" id="gender" name="gender"
                                                value="{{ $student->person->gender }}" type="text"
                                                placeholder="Digite o gênero do aluno" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="g_mus">G_MUS</label>
                                    <input class="form-control form-control-rounded" id="g_mus" name="g_mus" type="text"
                                        placeholder="Digite o Número" value="{{ $student->g_mus }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
