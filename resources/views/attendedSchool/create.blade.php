@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('attendedSchool.storeWithStudent', $student) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Cadastro de uma <b>nova</b> escola que o discente: <b>{{ $student->person->name }}</b> frequentou</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="year">Ano que o Aluno esteve na escola</label>
                                    <input class="form-control form-control-rounded" id="year" type="text" name="year"
                                        placeholder="Digite o ano aqui" value="{{ old('year') }}" autofocus/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="school_grade">Série/Ano<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="school_grade" type="text" value="{{ old('school_grade')}}"
                                        name="school_grade" placeholder="Digita qual serie e ano o aluno fazia nesta escola" required/>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="name">Escola<span style="font-size:13px; color:red;">*</span></label>
                                    <input class="form-control form-control-rounded" id="name" type="text" name="name" value="{{ old('name')}}"
                                        placeholder="Digite o nome da escola frenquentada pelo aluno" required/>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="network">Rede</label>
                                    <select class="form-control form-control-rounded" name="network" id="network">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="Particular"
                                            @if(old('network') =="Particular")
                                                selected
                                            @endif
                                        >Particular</option>
                                        <option value="Público"
                                            @if(old('network') =="Público")
                                                selected
                                            @endif
                                        >Público</option>
                                        <option value="Particular com bolsa"
                                            @if(old('network') =="Particular com bolsa")
                                                selected
                                            @endif
                                        >Particular com bolsa</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="type">Tipo<span style="font-size:13px; color:red;">*</span></label>
                                    <select class="form-control form-control-rounded" name="type" id="type">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="Creche"
                                            @if(old('type') =="Creche")
                                                selected
                                            @endif
                                        >Creche</option>
                                        <option value="Pré-escola"
                                            @if(old('type') =="Pré-escola")
                                                selected
                                            @endif
                                        >Pré-escola</option>
                                        <option value="Ensino médio"
                                            @if(old('type') =="Ensino médio")
                                                selected
                                            @endif
                                        >Ensino médio</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="city">Cidade onde fica a escola</label>
                                    <input class="form-control form-control-rounded" id="city" type="text" name="city"
                                        placeholder="digite a cidade onde fica a escola" value="{{ old('city')}}"/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="administrative_department">Dep. Administrativa</label>
                                    <input class="form-control form-control-rounded" id="administrative_department" type="text"
                                        name="administrative_department" placeholder="" value="{{ old('administrative_department')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('students.editForm', $student) }}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
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
                        @if($student->attendedSchools->count() > 0)
                        <div class="card-title mb-3">Escolas Frequentandas pelo do discente: <b>{{ $student->person->name }}</b></div>
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
                                                        style="width: 400px;">Escola</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Série/Ano</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 130px;">Tipo</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending"
                                                        style="width: 170px;">Ano que frenquentou</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 400px;">Mais informações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $student->attendedSchools as $attendedSchool)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $attendedSchool->name }}</td>
                                                    <td class="">{{ $attendedSchool->school_grade }}</td>
                                                    <td class="">{{ $attendedSchool->type}}</td>
                                                    <td class="">{{ $attendedSchool->year }}</td>
                                                    <td class="">
                                                        <a class="btn btn-outline-danger m-1" href="{{ route('attendedSchool.edit',$attendedSchool) }}" type="button">Editar Escola</a>
                                                        <a class="btn btn-outline-info m-1" href="{{ route('attendedSchool.show',$attendedSchool) }}" type="button">Vizualizar Escola</a>
                                                        {{-- <button class="btn btn-outline-info m-1" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                            Ativar endereço
                                                        </button>
                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Você tem certeza que deseja ativar endereço?</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Ao ativar ente enredeço o atual endereço do aluno(a) {{ $student->person->name }}ficara inativo
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('address.activeAddressStudent',['student' => $student, 'addressForActive'=> $address])}}" method="post">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancelar</button>
                                                                            <button class="btn btn-outline-info btn-sm m-1" type="submit" >Tornar o Ativo</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Escola</th>
                                                    <th rowspan="1" colspan="1">Série/Ano</th>
                                                    <th rowspan="1" colspan="1">Tipo</th>
                                                    <th rowspan="1" colspan="1">Ano que frenquentou</th>
                                                    <th rowspan="1" colspan="1">Mais informações</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card-title mb-3">Nenhuma escola foi cadastrada para o discente: <b>{{ $student->person->name }}</b></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
