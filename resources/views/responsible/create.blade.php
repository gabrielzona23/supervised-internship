@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('responsible.store',$registration) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Cadastro de um <b>novo</b> responsável do discente: <b>{{ $registration->student->person->name }}</b> referente ao ano de <b>{{ $registration->dateFormatYear() }}</b></div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name1">Nome do Responsável<span class="span-red">*</span></label>
                                    <input class="form-control form-control-rounded" id="name1" name="name1" type="text"
                                        placeholder="Digite o nome do responsável" required autofocus
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
                                        type="text" value="{{ old('kinship') }}"
                                        placeholder="Digite o Grau de Parentesco do responsável para com o Aluno" />
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="cpf1">CPF do Responsável<span class="span-red">*</span></label>
                                    <input class="form-control form-control-rounded" id="cpf1" name="cpf1" type="text"
                                        placeholder="Digite o CPF do Responsável" value="{{ old('cpf1') }}" required />
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
                                                type="text" placeholder="Digite o RG1 do Responsável" required
                                                value="{{ old('rg1') }}" />
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
                                                name="emitter_rg1" type="text" value="{{ old('emitter_rg1') }}" required
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
                                    <label for="family_bag">Possui Bolsa Família<span style="font-size:13px; color:red;">*</span></label>
                                    <select class="form-control form-control-rounded" name="family_bag" id="family_bag" required>
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="0"
                                            @if(old('family_bag')=="0")
                                                selected
                                            @endif
                                        >Não</option>
                                        <option value="1"
                                             @if(old('family_bag')=="1")
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
                                            <label for="phone3">Número de Telefone<span class="span-red">*</span></label>
                                            <input class="form-control form-control-rounded" id="phone3" name="phone3"
                                                type="text" placeholder="Digite o Número de telefone do Reponsável"
                                                required value="{{ old('phone3') }}" />
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
                                                value="{{ old('phone4') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="nis">NIS do Responsável</label>
                                    <input class="form-control form-control-rounded" id="nis" name="nis" type="text"
                                        placeholder="Digite o NIS do Responsável" value="{{ old('nis') }}" />
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="parents_divorced">Os pais são divorciados?</label>
                                            <select class="form-control form-control-rounded" name="parents_divorced" id="parents_divorced">
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="0"
                                                    @if(old('parents_divorced')=="0")
                                                        selected
                                                    @endif
                                                >Não</option>
                                                <option value="1"
                                                    @if(old('parents_divorced')=="1")
                                                        selected
                                                    @endif
                                                >Sim</option>
                                            </select>
                                        </div>

                                        <div class="col-9 form-group">
                                            <label for="student_custody">Caso sejam divorciados, quem pussui a guarda do
                                                Aluno</label>
                                            <input class="form-control form-control-rounded" id="student_custody"
                                                name="student_custody" type="text" value="{{ old('student_custody') }}"
                                                placeholder="Digite o Nome da pessoa que possui a guarda do Aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="guard_document">O responsável apresentou documentos comprobatórios da guarda?</label>
                                    <select class="form-control form-control-rounded" name="guard_document" id="guard_document">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="0"
                                            @if(old('guard_document')=="0")
                                                selected
                                            @endif
                                        >Não</option>
                                        <option value="1"
                                            @if(old('guard_document')=="1")
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
                    <a href="{{ route('registrations.edit',$registration) }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-md-12">
    <div class="card text-left">
        <div class="card-body">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Histórico de Responsáveis do discente: <b>{{ $registration->student->person->name }}</b></div>
                        <div class="table-responsive">
                            <div id="zero_configuration_table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="display table table-striped table-bordered dataTable"
                                            id="zero_configuration_table" style="width:100%" role="grid"
                                            aria-describedby="zero_configuration_table_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column descending" aria-sort="ascending"
                                                        style="width: 200px;">Nome</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">CPF</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 117px;">Telefone Principal</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending"
                                                        style="width: 140px;">Grau de Parentesco</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 50px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 420px;">Mais informações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $registration->responsiblies as $responsible)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $responsible->person->name }}</td>
                                                    <td class="">{{ $responsible->person->cpf }}</td>
                                                    <td class="">{{ $responsible->person->phone1}}</td>
                                                    <td class="">{{ $responsible->kinship }}</td>
                                                    @if($responsible->active==false)
                                                    <td class="">Inativo</td>
                                                    @else
                                                    <td class="">Ativo</td>
                                                    @endif
                                                    <td class="">
                                                        <a class="btn btn-outline-danger btn-sm m-1" href="{{ route('responsible.edit',$responsible) }}" type="button">Editar dados do Responsável</a>
                                                        <a class="btn btn-outline-info btn-sm m-1" href="{{ route('responsible.show',$responsible) }}" type="button">Vizualizar dados</a>
                                                        @if($responsible->active==false)
                                                            <button class="btn btn-outline-info btn-sm m-1" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                                Ativar Responsável
                                                            </button>
                                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Você tem certeza que deseja ativar <b>{{ $responsible->person->name }}</b> como responsavel?</h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Ao ativar este responsável o atual responsável do(a) aluno(a) <b>{{ $responsible->registrations[0]->student->person->name }}</b> ficará inativo!<br/>
                                                                            <br/>
                                                                            <b>Obs.: </b>Estes Responsáveis são referentes a matrícula de {{ $responsible->registrations[0]->dateFormatYear() }}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form action="{{route('responsible.activeResponsibleStudent', ['registration' => $registration, 'responsibleForActive'=> $responsible])}}" method="post">
                                                                                @csrf
                                                                                @method('put')
                                                                                <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancelar</button>
                                                                                <button class="btn btn-outline-info btn-sm m-1" type="submit" >Tornar o Ativo</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Nome</th>
                                                    <th rowspan="1" colspan="1">CPF</th>
                                                    <th rowspan="1" colspan="1">Telefone Principal</th>
                                                    <th rowspan="1" colspan="1">Grau de Parentesco</th>
                                                    <th rowspan="1" colspan="1">Status</th>
                                                    <th rowspan="1" colspan="1">Mais informações</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
