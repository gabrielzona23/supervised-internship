@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Escolas Frequentandas</div>
                <form action="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="year">Ano</label>
                            <input class="form-control form-control-rounded" id="year" type="text" name="year"
                                placeholder="" />
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="school_grade">Série/Ano*</label>
                            <input class="form-control form-control-rounded" id="school_grade" type="text"
                                name="school_grade" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Escola*</label>
                            <input class="form-control form-control-rounded" id="name" type="text" name="name"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="network">Rede</label>
                            <select class="form-control form-control-rounded">
                                <option>Particular</option>
                                <option>Particular com bolsa</option>
                                <option>Pública</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="type">Tipo*</label>
                            <select class="form-control form-control-rounded">
                                <option>Creche</option>
                                <option>Pré-escola</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="city">Local</label>
                            <input class="form-control form-control-rounded" id="city" type="text" name="city"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="adminstrative_department">Dep. Adminstrativa</label>
                            <input class="form-control form-control-rounded" id="adminstrative_department" type="text"
                                name="adminstrative_department" placeholder="" />
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Vacina Tomadas pelos Alunos</div>
                <form action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="checkbox checkbox-info">
                                <input class="form-control form-control-rounded" type="checkbox" id=""
                                    name="" /><span></span><span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <input class="form-control form-control-rounded" id="" type="text" name="" placeholder="" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Documentos Apresentados</div>
                <form action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="checkbox checkbox-info">
                                <input class="form-control form-control-rounded" type="checkbox" id=""
                                    name="" /><span>Histórico Escolar</span><span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Curso, Série e Turma</div>
                <form action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="course_name">Curso</label>
                            <input class="form-control form-control-rounded" id="course_name" type="text"
                                name="course_name" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="class">Série/Ano</label>
                            <input class="form-control form-control-rounded" id="class" type="text" name="class"
                                placeholder="" />
                        </div>


                        <div class="col-md-6 form-group mb-3">
                            <label for="previus_result">Resultado anterior</label>
                            <input class="form-control form-control-rounded" id="previus_result" type="text"
                                name="previus_result" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="modality">Modalidade*</label>
                            <select class="form-control form-control-rounded">
                                <option>-------------</option>
                                <option>Regular</option>
                                <option>Especial</option>
                                <option>EJA</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="turn">Turno*</label>
                            <select class="form-control form-control-rounded">
                                <option>-------------</option>
                                <option>Matutino</option>
                                <option>Vespertino</option>
                                <option>Noturn</option>
                                <option>Integral</option>
                                <option>Alternado</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="type_of_teaching">Ensino</label>
                            <select class="form-control form-control-rounded">
                                <option>-------------</option>
                                <option>Educação Infantil</option>
                                <option>Ensino Fundamental</option>
                                <option>8 anos</option>
                                <option>Outro Ensino</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="stage">Etapa*</label>
                            <select class="form-control form-control-rounded">
                                <option>-------------</option>
                                <option>Creche</option>
                                <option>Pré-Escola</option>
                                <option>8 anos</option>
                                <option>9 anos</option>
                                <option>Fundamental</option>
                                <option>Médio</option>
                                <option>Outro Etapa</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Composição Familiar</div>
                <form action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="numbers_of_members">Nº de pessoas que constituem a
                                família*</label>
                            <input class="form-control form-control-rounded" id="numbers_of_members" type="text"
                                name="numbers_of_members" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="number_of_dependents">Nº de dependentes </label>
                            <input class="form-control form-control-rounded" id="number_of_dependents" type="text"
                                name="number_of_dependents" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="number_of_older_brothes">Nº de irmãos mais velhos que o
                                aluno</label>
                            <input class="form-control form-control-rounded" id="number_of_older_brothes" type="text"
                                name="number_of_older_brothes" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="number_of_younger_brothes">Nº de irmãos mais novos que o
                                aluno</label>
                            <input class="form-control form-control-rounded" id="number_of_younger_brothes" type="text"
                                name="number_of_younger_brothes" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="inocome">Renda</label>
                            <input class="form-control form-control-rounded" id="income" type="text" name="income"
                                placeholder="" />
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Parente</div>
                <form action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nome do Parente*</label>
                            <input class="form-control form-control-rounded" id="name" type="text" name="name"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="born_city">Naturalidade</label>
                            <input class="form-control form-control-rounded" id="born_city" type="text" name="born_city"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="job">Profissão*</label>
                            <input class="form-control form-control-rounded" id="job" type="text" name="job"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="education_level">Nível de escolridade*</label>
                            <input class="form-control form-control-rounded" id="education_level" type="text"
                                name="education_level" placeholder="" />
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="kinship">Grau*</label>
                            <input class="form-control form-control-rounded" id="kinship" type="text" name="kinship"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="working">Atualmente está trabalhando*</label>
                            <select class="form-control form-control-rounded">
                                <option>-------------</option>
                                <option>Sim</option>
                                <option>Não</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="workplace_name">Local do trabalho</label>
                            <input class="form-control form-control-rounded" id="workplace_name" type="text"
                                name="workplace_name" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="hours_worked_daily">Horário de trabalho</label>
                            <input class="form-control form-control-rounded" id="hours_worked_daily" type="text"
                                name="hours_worked_daily" placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="phone1">Telefone 1*</label>
                            <input class="form-control form-control-rounded" id="phone1" type="text" name="phone1"
                                placeholder="" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="phone2">Telefone 2</label>
                            <input class="form-control form-control-rounded" id="phone2" type="text" name="phone2"
                                placeholder="" />
                        </div>

                        <div class="col-6 form-group">
                            <label for="rg">RG*</label>
                            <input class="form-control form-control-rounded" id="rg" name="rg" value="{{ old('rg') }}"
                                type="text" placeholder="Digite o RG" />
                        </div>

                        <div class="col-6 form-group">
                            <label for="emitter_rg">Órgão do emissor*</label>
                            <input class="form-control form-control-rounded" id="emitter_rg"
                                value="{{ old('emitter_rg') }}" name="emitter_rg" type="text"
                                placeholder="Digite o órgão emissor do RG do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="cpf">CPF*</label>
                            <input class="form-control form-control-rounded" id="cpf" name="cpf" type="text"
                                placeholder="Digite o cpf" value="{{ old('cpf') }}" required />
                            <div class="valid-feedback">
                                Tudo Ok!
                            </div>
                            <div class="invalid-feedback">
                                O campo acima não pode ser vazio
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end of main-content -->
@endsection
