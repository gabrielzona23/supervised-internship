@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('address.update', $address) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Vizualialização do endereço do(a) discente: <b>{{ $address->students[0]->person->name }}</b></div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="street">Rua</label>
                                    <input class="form-control form-control-rounded" id="street" disabled name="street"
                                        type="text"  value="{{ $address->street }}" required/>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo Rua não pode ser vazio!
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="city">Cidade</label>
                                            <input class="form-control form-control-rounded" id="city" disabled name="city"
                                                type="text" value="{{ $address->city }}" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Cidade não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="state">Estado</label>
                                            <input class="form-control form-control-rounded" id="state" disabled name="state"
                                                type="text" value="{{ $address->state }}" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Estado não pode ser vazio!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="neighborhood">Bairro</label>
                                            <input class="form-control form-control-rounded" id="neighborhood"
                                                disabled name="neighborhood"
                                                value="{{ $address->neighborhood }}" type="text" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Bairro não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="country">País</label>
                                            <input class="form-control form-control-rounded" id="country" disabled name="country"
                                                type="text" value="{{ $address->country }}"/>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo País não pode ser vazio!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="cep">CEP</label>
                                            <input class="form-control form-control-rounded" id="cep" disabled name="cep"
                                                type="text"
                                                value="{{ $address->cep }}" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo CEP não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="number">Número</label>
                                            <input class="form-control form-control-rounded" id="number" disabled name="number"
                                                type="text"
                                                value="{{ $address->number }}" required />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Número não pode ser vazio!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="electrical_installation_core">Código da instalação elétrica</label>
                                    <input class="form-control form-control-rounded" id="electrical_installation_core"
                                        disabled name="electrical_installation_core" type="text"
                                        value="{{ $address->electrical_installation_core}}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="residential_area">Área Residencial</label>
                                            <select class="form-control form-control-rounded" disabled name="residential_area"
                                                id="residential_area" value="{{ old('residential_area') }}" required>
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Urbana"
                                                    @if($address->residential_area == 'Urbana')
                                                        selected
                                                    @endif
                                                >Urbana</option>
                                                <option value="Rural"
                                                    @if($address->residential_area == 'Rural')
                                                        selected
                                                    @endif
                                                >Rural</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo Área Residencial não pode ser vazio!
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="type_transport">Tipo de transporte</label>
                                            <select class="form-control form-control-rounded" disabled name="type_transport"
                                                id="type_transport">
                                                <option value="" selected disabled>----Selecione----</option>
                                                <option value="Particular"
                                                    @if($address->type_transport =="Particular")
                                                        selected
                                                    @endif
                                                >Particular</option>
                                                <option value="Público"
                                                    @if($address->type_transport =="Público")
                                                        selected
                                                    @endif
                                                >Público</option>
                                                <option value="Escolar"
                                                    @if($address->type_transport =="Escolar")
                                                        selected
                                                    @endif
                                                >Escolar</option>
                                                <option value="Variado"
                                                    @if($address->type_transport =="Variado")
                                                        selected
                                                    @endif
                                                >Variado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="reference">Ponto de Referência</label>
                                    <input class="form-control form-control-rounded" id="reference" disabled name="reference"
                                        type="text" value="{{ $address->reference }}"
                                         />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="complement">Complemento</label>
                                    <input class="form-control form-control-rounded" id="complement" disabled name="complement"
                                        type="text" value="{{ $address->complement }}"
                                    />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="buses_name">Nome(s) do ônibus que o aluno pega</label>
                                    <input class="form-control form-control-rounded" id="buses_name" disabled name="buses_name" type="text"
                                       value="{{ $address->buses_name }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="transport_localization">Localidade Transporte</label>
                                    <input class="form-control form-control-rounded" id="transport_localization" disabled name="transport_localization" type="text"
                                        value="{{ $address->transport_localization }}" />
                                </div>

                                <div class="col-md-12 form-group mb-3">
                                    <label for="route">Rota</label>
                                    <input class="form-control form-control-rounded" id="route" disabled name="route" type="text"
                                       value="{{ $address->route }}" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('address.createAddressStudent',$address->students[0])}}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
                    {{-- <button type="submit" class="btn btn-primary">Salvar Alterações</button> --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
