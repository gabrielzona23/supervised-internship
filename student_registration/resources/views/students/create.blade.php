@extends('layouts.home')

@section('content')
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{ $errors->first('name') }}
    @endforeach
    @endif

    <div class="row">
        <div class="col-md-12">
            <!--  SmartWizard html -->
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Aluno<br /><small>Dados do Aluno</small></a></li>
                    <li><a href="#step-2">Documentos<br /><small>Documentos de Identificação do Aluno</small></a></li>
                    <li><a href="#step-3">Endereço<br /><small>Endereço do Aluno</small></a></li>
                    <li><a href="#step-4">Responsável<br /><small>Dados de Identificação Do Responsável do Aluno</small></a>
                        {{-- </li> --}}
                </ul>
                <div>
                    <div id="step-1">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-title mb-3">Identificação do Aluno</div>
                                    <form method="POST" action="{{ route('students.store') }}" class="needs-validation"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="name">Nome do aluno*</label>
                                                <input class="form-control form-control-rounded" id="name" name="name"
                                                    required type="text" placeholder="Digite o nome do aluno" />
                                                <div class="valid-feedback">
                                                    Tudo Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    O campo acima não pode ser vazio
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_date">Data de nascimento*</label>
                                                <input class="form-control form-control-rounded" id="born_date"
                                                    name="born_date" type="date" required />
                                                <div class="valid-feedback">
                                                    Tudo Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    O campo acima não pode ser vazio
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="cpf">CPF de Aluno</label>
                                                <input class="form-control form-control-rounded" id="cpf" name="cpf"
                                                    type="text" placeholder="Digite o CPF do aluno" required />
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
                                                        <label for="rg">RG do Aluno*</label>
                                                        <input class="form-control form-control-rounded" id="rg" name="rg"
                                                            type="text" placeholder="Digite o RG do aluno" required />
                                                        <div class="valid-feedback">
                                                            Tudo Ok!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            O campo acima não pode ser vazio
                                                        </div>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="emitter_rg">Órgão do emissor</label>
                                                        <input class="form-control form-control-rounded" id="emitter_rg"
                                                            name="emitter_rg" type="text"
                                                            placeholder="Digite o órgão emissor do RG do aluno" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="gender">Gênero</label>
                                                <input class="form-control form-control-rounded" id="gender" name="gender"
                                                    type="text" placeholder="Digite o gênero do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="nationality">Nacionalidade*</label>
                                                <input class="form-control form-control-rounded" id="nationality"
                                                    name="nationality" type="text" value="Brasileira"
                                                    placeholder="Digite o pais em que o aluno nasceu" required />
                                                <div class="valid-feedback">
                                                    Tudo Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    O campo acima não pode ser vazio
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_city">Naturalidade*</label>
                                                <input class="form-control form-control-rounded" id="born_city"
                                                    name="born_city" type="text"
                                                    placeholder="Digite a cidade em que o aluno nasceu" required />
                                                <div class="valid-feedback">
                                                    Tudo Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    O campo acima não pode ser vazio
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_state">UF*</label>
                                                <input class="form-control form-control-rounded" id="born_state"
                                                    name="born_state" type="text"
                                                    placeholder="Digite o estado em que aluno nasceu" required />
                                                <div class="valid-feedback">
                                                    Tudo Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    O campo acima não pode ser vazio
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="phone1">Número de telefone principal</label>
                                                <input class="form-control form-control-rounded" id="phone1" name="phone1"
                                                    type="text"
                                                    placeholder="Digite o número de telefone para comunicação com Aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="phone2">Número de telefone secundário</label>
                                                <input class="form-control form-control-rounded" id="phone2" name="phone2"
                                                    type="text"
                                                    placeholder="Digite o número de telefone secundário para comunicação para com o Aluno" />
                                            </div>



                                            <div class="col-md-6 form-group mb-3">
                                                <label for="job">Profissão*</label>
                                                <input class="form-control form-control-rounded" id="job" name="job"
                                                    type="text" placeholder="Digite a profissão do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="number_car_sus">Número do cartão do sus</label>
                                                <input class="form-control form-control-rounded" id="number_card_sus"
                                                    name="number_card_sus" type="text"
                                                    placeholder="Digite o cartão do sus do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="inep_code">Código INEP</label>
                                                <input class="form-control form-control-rounded" id="inep_code"
                                                    name="inep_code" type="text"
                                                    placeholder="Digite o código do inep do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="nis">NIS do Aluno</label>
                                                <input class="form-control form-control-rounded" id="nis" name="nis"
                                                    type="text" placeholder="Digite o nis do aluno" />
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label for="color">Cor</label>
                                                <select class="form-control form-control-rounded" name="color" id="color">
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="breed">Raça</label>
                                                <select class="form-control form-control-rounded" id="breed" name="breed">
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <span for="image_authorization">O Responsável autoriza a divuldagação de
                                                    fotos em trabalhos
                                                    escolares em redes sociais?*</span>
                                                <label class="switch pr-5 switch-primary mx-5">
                                                    <input class="form-control form-control-rounded"
                                                        id="image_authorization" name="image_authorization" type="checkbox"
                                                        checked="checked" /><span class="slider"></span>
                                                </label>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <span for="special_needs_check">O aluno possuí necessidades
                                                    Especiais?*</span>
                                                <label class="switch pr-5 switch-secondary mx-5">
                                                    <input class="form-control form-control-rounded"
                                                        id="special_needs_check" name="special_needs_check" type="checkbox"
                                                        checked="checked" /><span class="slider"></span>
                                                </label>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="programs">Programas*</label>
                                                <select class="form-control form-control-rounded" id="programs"
                                                    name="programs">
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="special_needs">Necessidades Especiais*</label>
                                                <select class="form-control form-control-rounded" id="special_needs"
                                                    name="special_needs">
                                                    @foreach ($special_needs as $special_need)
                                                        <option value="{{ $special_need->id }}">{{ $special_need->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-2">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-title mb-3">Documentos de identificação do aluno</div>
                                    <form method="POST" action="{{ route('students.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="name">Nome do aluno</label>
                                                <input class="form-control form-control-rounded" id="name" name="name"
                                                    type="text" placeholder="Digite o nome do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_date">Data de nascimento</label>
                                                <input class="form-control form-control-rounded" id="born_date"
                                                    name="born_date" type="text" placeholder="dd-mm-yyyy" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="cpf">Cpf de Aluno</label>
                                                <input class="form-control form-control-rounded" id="cpf" name="cpf"
                                                    type="text" placeholder="Digite o cpf do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="rg">Rg do Aluno</label>
                                                <input class="form-control form-control-rounded" id="rg" name="rg"
                                                    type="text" placeholder="Digite o rg do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="gender">Gênero</label>
                                                <input class="form-control form-control-rounded" id="gender" name="gender"
                                                    type="text" placeholder="Digite o gênero do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="nationality">Nacionalidade</label>
                                                <input class="form-control form-control-rounded" id="nationality"
                                                    name="nationality" type="text"
                                                    placeholder="Digite o pais em que o aluno nasceu" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_city">Naturalidade</label>
                                                <input class="form-control form-control-rounded" id="born_city"
                                                    name="born_city" type="text"
                                                    placeholder="Digite a cidade em que o aluno nasceu" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="born_state">UF</label>
                                                <input class="form-control form-control-rounded" id="born_state"
                                                    name="born_state" type="text"
                                                    placeholder="Digite o estado em que aluno nasceu" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="job">Profissão</label>
                                                <select class="form-control form-control-rounded" name="job" id="job">
                                                    <option value="1">Estudante</option>
                                                    <option value="2">Auxliar Administrativo</option>
                                                    <option value="3">Secretario</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="number_car_sus">Número do cartão do sus</label>
                                                <input class="form-control form-control-rounded" id="number_card_sus"
                                                    name="number_card_sus" type="text"
                                                    placeholder="Digite o cartão do sus do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="inep_code">Código INEP</label>
                                                <input class="form-control form-control-rounded" id="inep_code"
                                                    name="inep_code" type="text"
                                                    placeholder="Digite o código do inep do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="nis">NIS do Aluno</label>
                                                <input class="form-control form-control-rounded" id="nis" name="nis"
                                                    type="text" placeholder="Digite o nis do aluno" />
                                            </div>


                                            <div class="col-md-6 form-group mb-3">
                                                <label for="color">Cor</label>
                                                <select class="form-control form-control-rounded" name="color" id="color">
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="breed">Raça</label>
                                                <select class="form-control form-control-rounded" id="breed" name="breed">
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                    <option>Option 1</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <span for="special_needs_check">O Responsável autoriza a divuldagação de
                                                    fotos em trabalhos
                                                    escolares em redes sociais?</span>
                                                <label class="switch pr-5 switch-primary mx-5">
                                                    <input class="form-control form-control-rounded"
                                                        id="image_authorization" name="image_authorization" type="checkbox"
                                                        checked="checked" /><span class="slider"></span>
                                                </label>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <span for="special_needs_check">O aluno possuí necessidades
                                                    Especiais?</span>
                                                <label class="switch pr-5 switch-secondary mx-5">
                                                    <input class="form-control form-control-rounded"
                                                        id="special_needs_check" name="special_needs_check" type="checkbox"
                                                        checked="checked" /><span class="slider"></span>
                                                </label>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="program">Programas</label>
                                                <select class="form-control form-control-rounded" id="programs"
                                                    name="programs">
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="special_needs">Necessidades Especiais</label>
                                                <select class="form-control form-control-rounded" id="special_needs"
                                                    name="special_needs">
                                                    @foreach ($special_needs as $special_need)
                                                        <option value="{{ $special_need->id }}">{{ $special_need->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-3">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-title mb-3">Informações do Endereço do aluno</div>
                                    <form method="POST" action="{{ route('addresses.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="street">Rua*</label>
                                                <input class="form-control form-control-rounded" id="street" name="street"
                                                    type="text" placeholder="Digite a Rua em que mora o aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="city">Cidade*</label>
                                                <input class="form-control form-control-rounded" id="city" name="city"
                                                    type="text" placeholder="Digite a cidade onde mora o aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="state">Estado*</label>
                                                <input class="form-control form-control-rounded" id="state" name="state"
                                                    type="text" placeholder="Digite o estado onde mora o aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="cep">CEP*</label>
                                                <input class="form-control form-control-rounded" id="cep" name="cep"
                                                    type="text" placeholder="Digite o cep referente ao endereço do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="number">Número*</label>
                                                <input class="form-control form-control-rounded" id="number" name="number"
                                                    type="text"
                                                    placeholder="Digite o Número referente ao endereço do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="neighborhood">Bairro*</label>
                                                <input class="form-control form-control-rounded" id="neighborhood"
                                                    name="neighborhood" type="text"
                                                    placeholder="Digite o Bairro em que o aluno mora" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="electrical_installation_core">Código instalação elétrica</label>
                                                <input class="form-control form-control-rounded"
                                                    id="electrical_installation_core" name="electrical_installation_core"
                                                    type="text"
                                                    placeholder="Digite o código da instalação elétrica do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="residential_area">Área Residencial</label>
                                                <select class="form-control form-control-rounded" name="residential_area"
                                                    id="residential_area">
                                                    <option value="1">Urbana</option>
                                                    <option value="2">Rural</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="type_transport">Tipo de traporte</label>
                                                <select class="form-control form-control-rounded" name="type_transport"
                                                    id="type_transport">
                                                    <option value="1">Particular</option>
                                                    <option value="2">Público</option>
                                                    <option value="2">Escolar</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="job">Profissão</label>
                                                <select class="form-control form-control-rounded" name="job" id="job">
                                                    <option value="1">Estudante</option>
                                                    <option value="2">Auxliar Administrativo</option>
                                                    <option value="3">Secretario</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="route">Rota</label>
                                                <input class="form-control form-control-rounded" id="route" name="route"
                                                    type="text" placeholder="Digite o rota de transporte do aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="reference">Ponto de Referência</label>
                                                <input class="form-control form-control-rounded" id="reference"
                                                    name="reference" type="text"
                                                    placeholder="Digite o ponto de referência do endereço do aluno" />
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step-4">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-title mb-3">Dados de Identificação do reponsável</div>
                                    <form method="POST" action="{{ route('responsiblies.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="name">Nome do Responsável*</label>
                                                <input class="form-control form-control-rounded" id="name" name="name"
                                                    type="text" placeholder="Digite o nome do responsável" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="kinship">Grau de parentesco</label>
                                                <input class="form-control form-control-rounded" id="kinship" name="kinship"
                                                    type="text"
                                                    placeholder="Digite o Grau de parentesco do responsável para com o Aluno" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="cpf">CPF do Responsável</label>
                                                <input class="form-control form-control-rounded" id="cpf" name="cpf"
                                                    type="text" placeholder="Digite o cpf do responsável" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <div class="row">
                                                    <div class="col-6 form-group">
                                                        <label for="rg">RG do Responsável</label>
                                                        <input class="form-control form-control-rounded" id="rg" name="rg"
                                                            type="text" placeholder="Digite o RG do Responsável" />
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="emitter_rg">Órgão do emissor</label>
                                                        <input class="form-control form-control-rounded" id="emitter_rg"
                                                            name="emitter_rg" type="text"
                                                            placeholder="Digite o órgão emissor do RG do Responsável" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="family_bag">Possui Bolsa Família</label>
                                                <select class="form-control form-control-rounded" name="family_bag"
                                                    id="family_bag">
                                                    <option value="1">Sim</option>
                                                    <option value="0">Não</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="phone1">Número de telefone principal</label>
                                                <input class="form-control form-control-rounded" id="phone1" name="phone1"
                                                    type="text" placeholder="Digite o número de telefone do reponsável" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="phone2">Número de telefone secundário</label>
                                                <input class="form-control form-control-rounded" id="phone2" name="phone2"
                                                    type="text" placeholder="Digite o número de telefone do reponsável" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <label for="nis">NIS do Responsável</label>
                                                <input class="form-control form-control-rounded" id="nis" name="nis"
                                                    type="text" placeholder="Digite o nis do Responsável" />
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <div class="row">
                                                    <div class="col-6 form-group">
                                                        <span for="parents_divorced">Os pais são divorciados?*</span>
                                                        <label class="switch pr-5 switch-primary mx-5">
                                                            <input class="form-control form-control-rounded"
                                                                id="parents_divorced" name="parents_divorced"
                                                                type="checkbox" checked="checked" /><span
                                                                class="slider"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="student_custody">Nome da pessoa que pussui a guarda do
                                                            Aluno</label>
                                                        <input class="form-control form-control-rounded"
                                                            id="student_custody" name="student_custody" type="text"
                                                            placeholder="Digite o Nome da pessoa que possui a guarda do Aluno" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group mb-3">
                                                <span for="guard_document">O responsavel apresentou documentos
                                                    comprobatórios da guarda?*</span>
                                                <label class="switch pr-5 switch-secondary mx-5">
                                                    <input class="form-control form-control-rounded" id="guard_document"
                                                        name="guard_document" type="checkbox" checked="checked" /><span
                                                        class="slider"></span>
                                                </label>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
