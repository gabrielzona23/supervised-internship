<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
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
