@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('registrations.store') }}" class="needs-validation"
            novalidate="novalidate">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-3">Identificação do Novo Aluno(a) <b>{{ old('name') }}</b></h4>
                <div class="separator-breadcrumb border-top"></div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Informações de identificação do Aluno(a)</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name">Nome do aluno(a)*</label>
                                    <input class="form-control form-control-rounded" id="name" name="name" required
                                        type="text" placeholder="Digite o nome do aluno(a)" value="{{ old('name') }}" />
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
                                                name="born_date" value="{{ old('born_date') }}" type="date" required />
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
                                                type="text" value="{{ old('cpf') }}"
                                                placeholder="Digite o CPF do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="born_state">Estado onde o aluno nasceu*</label>
                                    <input class="form-control form-control-rounded" id="born_state" type="text"
                                        required name="born_state" @if (old('born_state'))
                                        value="{{ old('born_state') }}" @else value="Acre" @endif />
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
                                                value="{{ old('rg') }}" type="text"
                                                placeholder="Digite o RG do aluno" />
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="emitter_rg">Órgão do emissor</label>
                                            <input class="form-control form-control-rounded" id="emitter_rg"
                                                value="{{ old('emitter_rg') }}" name="emitter_rg" type="text"
                                                placeholder="Digite o órgão emissor do RG do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="nationality">Nacionalidade*</label>
                                            <input class="form-control form-control-rounded" id="nationality"
                                                name="nationality" type="text" required @if (old('nationality'))
                                                value="{{ old('nationality') }}" @else value="Brasileira" @endif />
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
                                                name="born_city" value="{{ old('born_city') }}" type="text"
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
                                                value="{{ old('phone1') }}" type="text" required
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
                                                value="{{ old('phone2') }}" type="text"
                                                placeholder="Digite o número de telefone secundário" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="number_car_sus">Número do cartão do sus</label>
                                            <input class="form-control form-control-rounded" id="number_card_sus"
                                                value="{{ old('number_card_sus') }}" name="number_card_sus" type="text"
                                                placeholder="Digite o cartão do sus do aluno" />
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="inep_code">Código INEP</label>
                                            <input class="form-control form-control-rounded" id="inep_code"
                                                name="inep_code" value="{{ old('inep_code') }}" type="text"
                                                placeholder="Digite o código do inep do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="job">Profissão</label>
                                            <input class="form-control form-control-rounded" id="job" name="job"
                                                type="text" @if (old('job')) value="{{ old('job') }}" @else
                                                value="Estudante" @endif />
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="nis">NIS do Aluno</label>
                                            <input class="form-control form-control-rounded" id="nis" name="nis"
                                                type="text" value="{{ old('nis') }}"
                                                placeholder="Digite o nis do aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="programs">Programas*</label>
                                            <select class="form-control form-control-rounded" id="programs"
                                                name="programs"  required>
                                                <option value="" disabled selected>----Selecione----</option>
                                                <option value="0">Nenhum</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}"
                                                    @if(old('programs')==$program->id)
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
                                                <option value="0"
                                                    @if(old('has_special_needs')=="0")
                                                        selected
                                                    @endif
                                                >Não</option>
                                                <option value="1"
                                                    @if(old('has_special_needs')=="1")
                                                        selected
                                                    @endif
                                                >Sim</option>
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
                                        placeholder="Digite as necessidades educacionais"
                                        value="{{ old('special_educational_needs') }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label for="color">Cor</label>
                                            <input class="form-control form-control-rounded" type="text" name="color"
                                                id="color" placeholder="Digite a Cor"
                                                value="{{ old('color') }}" />
                                        </div>

                                        <div class="col-4 form-group">
                                            <label for="breed">Raça</label>
                                            <input class="form-control form-control-rounded" type="text" id="breed"
                                                placeholder="Digite a Raça" name="breed"
                                                value="{{ old('breed') }}" />
                                        </div>

                                        <div class="col-4 form-group">
                                            <label for="gender">Gênero</label>
                                            <input class="form-control form-control-rounded" id="gender" name="gender"
                                                value="{{ old('gender') }}" type="text"
                                                placeholder="Digite o gênero" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="image_authorization">O Responsável autoriza a divuldagação de fotos em trabalhos
                                        escolares em redes sociais?</label>
                                    <select class="form-control form-control-rounded" name="image_authorization"
                                        id="image_authorization">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="0"
                                            @if(old('image_authorization')=="0")
                                                selected
                                            @endif
                                        >Não</option>
                                        <option value="1"
                                            @if(old('image_authorization')=="1")
                                                selected
                                            @endif
                                        >Sim</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="g_mus">G_MUS</label>
                                    <input class="form-control form-control-rounded" id="g_mus" name="g_mus" type="text"
                                        placeholder="Digite o Número" value="{{ old('g_mus') }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="school_year">Ano Letivo*</label>
                                    <input class="form-control form-control-rounded" id="school_year" name="school_year"
                                        required type="text" placeholder="Digite o ano Letivo dá mátricula"
                                        value="{{ old('school_year') }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Documentos de identificação do Aluno</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="document_model">Modelo de Documento*</label>
                                            <select class="form-control form-control-rounded" name="document_model"
                                                id="document_model" required>
                                                <option value="" selected disabled>----Selecione O Modelo----</option>
                                                <option value="new"
                                                    @if(old('document_model')=="new")
                                                        selected
                                                    @endif
                                                >Modelo Novo</option>
                                                <option value="old"
                                                    @if(old('document_model')=="old")
                                                        selected
                                                    @endif
                                                >Modelo Antigo</option>
                                                <option value="others"
                                                    @if(old('document_model')=="others")
                                                        selected
                                                    @endif
                                                >Outro Documento</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="document_number">Número do Documento*</label>
                                            <input class="form-control form-control-rounded" id="document_number"
                                                name="document_number" type="text" placeholder="Digite o número do Documento"
                                                value="{{ old('document_number') }}" required />
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
                                    <label for="name_registry">Nome do Cartório</label>
                                    <input class="form-control form-control-rounded" id="name_registry"
                                        name="name_registry" type="text" placeholder="Digite o nome do cartório"
                                        value="{{ old('name_registry') }}" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label for="type_of_certificate">Tipo de Certidão</label>
                                            <select class="form-control form-control-rounded" name="type_of_certificate"
                                                id="type_of_certificate" >
                                                <option value="" selected disabled>----Selecione A Certidão----</option>
                                                <option value="Nascimento"
                                                    @if(old('type_of_certificate')=="Nascimento")
                                                        selected
                                                    @endif
                                                >Certidão de Nascimento</option>
                                                <option value="Casamento"
                                                    @if(old('type_of_certificate')=="Casamento")
                                                        selected
                                                    @endif
                                                >Certidão de casamento</option>
                                            </select>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label for="city_registry">Munícipio do Cartório</label>
                                            <input class="form-control form-control-rounded" id="city_registry"
                                                name="city_registry" type="text" placeholder="Digite o número do Termo"
                                                value="{{ old('city_registry') }}" />
                                        </div>
                                        <div class="col-4 form-group">
                                            <label for="state_registry">Estado onde fica o cartório</label>
                                            <input class="form-control form-control-rounded" id="state_registry"
                                                name="state_registry" type="text" placeholder="Digite o estado"
                                                value="{{ old('state_registry') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="term_number">Número do Termo</label>
                                            <input class="form-control form-control-rounded" id="term_number"
                                                name="term_number" type="text" placeholder="Digite o número do Termo"
                                                value="{{ old('term_number') }}" />
                                        </div>
                                        <div class="col-3 form-group">
                                            <label for="sheet_number">Número da folha</label>
                                            <input class="form-control form-control-rounded" id="sheet_number"
                                                name="sheet_number" type="text" placeholder="Digite o número da folha"
                                                value="{{ old('sheet_number') }}" />
                                        </div>
                                        <div class="col-3 form-group">
                                            <label for="book_number">Número do livro</label>
                                            <input class="form-control form-control-rounded" id="book_number"
                                                name="book_number" type="text" placeholder="Digite o número do livro"
                                                value="{{ old('book_number') }}" />
                                        </div>
                                        <div class="col-3 form-group">
                                            <label for="emission_date">Data de emissão</label>
                                            <input class="form-control form-control-rounded" id="emission_date"
                                                name="emission_date" type="text" placeholder="Digite a data da emissão"
                                                value="{{ old('emission_date') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Informações do Endereço do aluno</div>
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
                                                    @if(old('residential_area')=="Urbana")
                                                        selected
                                                    @endif
                                                >Urbana</option>
                                                <option value="Rural"
                                                    @if(old('residential_area')=="Rural")
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
                                                id="type_transport" value="{{ old('type_transport') }}">
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
                                        placeholder="Digite o ponto de referência do endereço do aluno" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="complement">Complemento</label>
                                    <input class="form-control form-control-rounded" id="complement" name="complement"
                                        type="text" value="{{ old('complement') }}"
                                        placeholder="Digite o complemento do endereço do aluno" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="buses_name">Nome(s) do ônibus que o aluno pega</label>
                                    <input class="form-control form-control-rounded" id="buses_name" name="buses_name" type="text"
                                        placeholder="Digite o rota de transporte do aluno" value="{{ old('buses_name') }}" />
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Dados de Identificação do reponsável</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name1">Nome do Responsável*</label>
                                    <input class="form-control form-control-rounded" id="name1" name="name1" type="text"
                                        placeholder="Digite o nome do responsável" required
                                        value="{{ old('name1') }}" />
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="kinship">Grau de parentesco</label>
                                    <input class="form-control form-control-rounded" id="kinship" name="kinship"
                                        type="text" value="{{ old('kinship') }}"
                                        placeholder="Digite o Grau de parentesco do responsável para com o Aluno" />
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="cpf1">CPF do Responsável*</label>
                                    <input class="form-control form-control-rounded" id="cpf1" name="cpf1" type="text"
                                        placeholder="Digite o cpf do responsável" value="{{ old('cpf1') }}" required />
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
                                            <label for="rg1">RG do Responsável*</label>
                                            <input class="form-control form-control-rounded" id="rg1" name="rg1"
                                                type="text" placeholder="Digite o RG do Responsável" required
                                                value="{{ old('rg1') }}" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
                                            </div>
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="emitter_rg1">Órgão do emissor*</label>
                                            <input class="form-control form-control-rounded" id="emitter_rg1"
                                                name="emitter_rg1" type="text" value="{{ old('emitter_rg1') }}" required
                                                placeholder="Digite o órgão emissor do RG do Responsável" />
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
                                    <label for="family_bag">Possui Bolsa Família*</label>
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
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="phone3">Número de telefone principal*</label>
                                            <input class="form-control form-control-rounded" id="phone3" name="phone3"
                                                type="text" placeholder="Digite o número de telefone do reponsável"
                                                required value="{{ old('phone3') }}" />
                                            <div class="valid-feedback">
                                                Tudo Ok!
                                            </div>
                                            <div class="invalid-feedback">
                                                O campo acima não pode ser vazio
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
                                    <label for="nis1">NIS do Responsável</label>
                                    <input class="form-control form-control-rounded" id="nis1" name="nis1" type="text"
                                        placeholder="Digite o nis do Responsável" value="{{ old('nis1') }}" />
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
                                            <label for="student_custody">Caso sejam divorciados, Quem pussui a guarda do
                                                Aluno</label>
                                            <input class="form-control form-control-rounded" id="student_custody"
                                                name="student_custody" type="text" value="{{ old('student_custody') }}"
                                                placeholder="Digite o Nome da pessoa que possui a guarda do Aluno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="guard_document">O responsavel apresentou documentos comprobatórios da guarda?</label>
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
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
