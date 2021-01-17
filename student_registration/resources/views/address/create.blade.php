@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('address.storeAddressStudent', $student) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Cadastro de um novo Endereço do discente {{ $student->person->name }}</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="street">Rua*</label>
                                    <input class="form-control form-control-rounded" id="street" name="street"
                                        type="text" placeholder="Digite a Rua em que mora o aluno"
                                        value="{{ old('street') }}" required />
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
                                            <input class="form-control form-control-rounded" id="city" name="city"
                                                type="text" @if(old('city')) value="{{ old('city')}}" @else
                                                value="Rio Branco" @endif required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="state">Estado*</label>
                                            <input class="form-control form-control-rounded" id="state" name="state"
                                                type="text" @if(old('state')) value="{{ old('state')}}" @else
                                                value="Acre" @endif required />
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
                                    <label for="neighborhood">Bairro*</label>
                                    <input class="form-control form-control-rounded" id="neighborhood"
                                        name="neighborhood" type="text"
                                        placeholder="Digite o Bairro em que o aluno mora"
                                        value="{{ old('neighborhood') }}" required />
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
                                                id="residential_area" value="{{ old('residential_area') }}" required>
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Urbana">Urbana</option>
                                                <option value="Rural">Rural</option>
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
                                                id="type_transport" value="{{ old('type_transport') }}">
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Particular">Particular</option>
                                                <option value="Público">Público</option>
                                                <option value="Escolar">Escolar</option>
                                                <option value="Variado">Variado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="reference">Ponto de Referência</label>
                                    <input class="form-control form-control-rounded" id="reference" name="reference"
                                        type="text" value="{{ old('reference') }}"
                                        placeholder="Digite o ponto de referência do endereço do aluno" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="route">Rota</label>
                                    <input class="form-control form-control-rounded" id="route" name="route" type="text"
                                        placeholder="Digite o rota de transporte do aluno" value="{{ old('route') }}" />
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
