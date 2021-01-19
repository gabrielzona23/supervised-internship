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
                            <div class="card-title mb-3">Cadastro de um <b>novo</b> endereço do discente: <b>{{ $student->person->name }}</b></div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="street">Rua*</label>
                                    <input class="form-control form-control-rounded" id="street" name="street"
                                        type="text" placeholder="Digite a Rua em que mora o aluno"
                                        value="{{ old('street') }}" required autofocus/>
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
                                            <label for="city">Cidade*</label>
                                            <input class="form-control form-control-rounded" id="city" name="city" type="text" required
                                                @if(old('city'))
                                                    value="{{ old('city')}}"
                                                @else
                                                    value="Rio Branco"
                                                @endif />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="state">Estado*</label>
                                            <input class="form-control form-control-rounded" id="state" name="state" type="text" required
                                                @if(old('state'))
                                                    value="{{ old('state')}}"
                                                @else
                                                    value="Acre"
                                                @endif/>
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
                                            <label for="neighborhood">Bairro*</label>
                                            <input class="form-control form-control-rounded" id="neighborhood"
                                                name="neighborhood" placeholder="Digite o Bairro em que o aluno mora"
                                                value="{{ old('neighborhood') }}" type="text" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="country">Pais*</label>
                                            <input class="form-control form-control-rounded" id="country" name="country"
                                                type="text" placeholder="Digite o pais onde o aluno mora"
                                                @if(old('country'))
                                                    value="{{ old('country')}}"
                                                @else
                                                    value="Brasil"
                                                @endif/>
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
                                            <label for="cep">CEP*</label>
                                            <input class="form-control form-control-rounded" id="cep" name="cep"
                                                type="text" placeholder="Digite o cep referente ao endereço do aluno"
                                                value="{{ old('cep') }}" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="number">Número*</label>
                                            <input class="form-control form-control-rounded" id="number" name="number"
                                                type="text" placeholder="Digite o Número referente ao endereço do aluno"
                                                value="{{ old('number') }}" required />
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
                                    <label for="electrical_installation_core">Código da instalação elétrica</label>
                                    <input class="form-control form-control-rounded" id="electrical_installation_core"
                                        name="electrical_installation_core" type="text"
                                        placeholder="Digite o código da instalação elétrica"
                                        value="{{ old('electrical_installation_core') }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="residential_area">Área Residencial*</label>
                                            <select class="form-control form-control-rounded" name="residential_area"
                                                id="residential_area" required>
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Urbana"
                                                    @if(old('residential_area') &&old('residential_area') =="Urbana")
                                                        selected
                                                    @endif
                                                />Urbana</option>
                                                <option value="Rural"
                                                    @if(old('residential_area') &&old('residential_area') =="Rural")
                                                        selected
                                                    @endif
                                                >Rural</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="type_transport">Tipo de transporte</label>
                                            <select class="form-control form-control-rounded" name="type_transport"
                                                id="type_transport">
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Particular"
                                                    @if(old('type_transport') =="Particular")
                                                        selected
                                                    @endif
                                                >Particular</option>
                                                <option value="Público"
                                                    @if(old('type_transport') =="Público")
                                                        selected
                                                    @endif
                                                >Público</option>
                                                <option value="Escolar"
                                                    @if(old('type_transport') =="Escolar")
                                                        selected
                                                    @endif
                                                >Escolar</option>
                                                <option value="Variado"
                                                    @if(old('type_transport') =="Variado")
                                                        selected
                                                    @endif
                                                >Variado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="reference">Ponto de Referência</label>
                                    <input class="form-control form-control-rounded" id="reference" name="reference"
                                        type="text" value="{{ old('reference') }}"
                                        placeholder="Digite o ponto de referência do endereço" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="complement">Complemento</label>
                                    <input class="form-control form-control-rounded" id="complement" name="complement"
                                        type="text" value="{{ old('complement') }}"
                                        placeholder="Digite o complemento do endereço" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="buses_name">Nome(s) do ônibus que o aluno pega</label>
                                    <input class="form-control form-control-rounded" id="buses_name" name="buses_name" type="text"
                                        placeholder="Digite o rota de transporte" value="{{ old('buses_name') }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="transport_localization">Localidade Transporte</label>
                                    <input class="form-control form-control-rounded" id="transport_localization" name="transport_localization" type="text"
                                        placeholder="Digite o localidade de transporte" value="{{ old('transport_localization') }}" />
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label for="route">Rota</label>
                                    <input class="form-control form-control-rounded" id="route" name="route" type="text"
                                        placeholder="Digite o rota de transporte" value="{{ old('route') }}" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Voltar</a>
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
                        <div class="card-title mb-3">Endereços do discente: <b>{{ $student->person->name }}</b></div>
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
                                                        style="width: 200px;">Rua</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Bairro</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 117px;">CEP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending"
                                                        style="width: 100px;">Número</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 90px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 420px;">Mais informações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $student->addresses as $address)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $address->street }}</td>
                                                    <td class="">{{ $address->neighborhood }}</td>
                                                    <td class="">{{ $address->cep}}</td>
                                                    <td class="">{{ $address->number }}</td>
                                                    <td class="">{{ $address->status }}</td>
                                                    <td class="">
                                                        <a class="btn btn-outline-danger btn-sm m-1" href="{{ route('addresses.edit',$address) }}" type="button">Editar Endereço</a>
                                                        @if($address->status =='Inativo')
                                                            <button class="btn btn-outline-info btn-sm m-1" type="button" data-toggle="modal" data-target="#exampleModalCenter">
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
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Rua</th>
                                                    <th rowspan="1" colspan="1">Bairro</th>
                                                    <th rowspan="1" colspan="1">CEP</th>
                                                    <th rowspan="1" colspan="1">Número</th>
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
