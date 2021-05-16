<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
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
