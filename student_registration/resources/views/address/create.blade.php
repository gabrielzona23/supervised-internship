@extends('layouts.smart_wizard_form')

@section('content_step_2')

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Identificação do Aluno</div>
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nome do aluno</label>
                            <input class="form-control form-control-rounded" id="name" name="name" type="text"
                                placeholder="Digite o nome do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="born_date">Data de nascimento</label>
                            <input class="form-control form-control-rounded" id="born_date" name="born_date" type="text"
                                placeholder="dd-mm-yyyy" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="cpf">Cpf de Aluno</label>
                            <input class="form-control form-control-rounded" id="cpf" name="cpf" type="text"
                                placeholder="Digite o cpf do aluno" data-mask="999.999.999-99"
                                data-mask-selectonfocus="true" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="rg">Rg do Aluno</label>
                            <input class="form-control form-control-rounded" id="rg" name="rg" type="text"
                                placeholder="Digite o rg do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="gender">Gênero</label>
                            <input class="form-control form-control-rounded" id="gender" name="gender" type="text"
                                placeholder="Digite o gênero do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="nationality">Nacionalidade</label>
                            <input class="form-control form-control-rounded" id="nationality" name="nationality" type="text"
                                placeholder="Digite o pais em que o aluno nasceu" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="born_city">Naturalidade</label>
                            <input class="form-control form-control-rounded" id="born_city" name="born_city" type="text"
                                placeholder="Digite a cidade em que o aluno nasceu" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="born_state">UF</label>
                            <input class="form-control form-control-rounded" id="born_state" name="born_state" type="text"
                                placeholder="Digite o estado em que aluno nasceu" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="job">Profissão</label>
                            <input class="form-control form-control-rounded" id="job" name="job" type="text"
                                placeholder="Digite a profissão do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="number_car_sus">Número do cartão do sus</label>
                            <input class="form-control form-control-rounded" id="number_card_sus" name="number_card_sus"
                                type="text" placeholder="Digite o cartão do sus do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="inep_code">Código INEP</label>
                            <input class="form-control form-control-rounded" id="inep_code" name="inep_code" type="text"
                                placeholder="Digite o código do inep do aluno" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="nis">NIS do Aluno</label>
                            <input class="form-control form-control-rounded" id="nis" name="nis" type="text"
                                placeholder="Digite o nis do aluno" />
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
                            <span for="special_needs_check">O Responsável autoriza a divuldagação de fotos em trabalhos
                                escolares em redes sociais?</span>
                            <label class="switch pr-5 switch-primary mx-5">
                                <input class="form-control form-control-rounded" id="image_authorization"
                                    name="image_authorization" type="checkbox" checked="checked" /><span
                                    class="slider"></span>
                            </label>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <span for="special_needs_check">O aluno possuí necessidades Especiais?</span>
                            <label class="switch pr-5 switch-secondary mx-5">
                                <input class="form-control form-control-rounded" id="special_needs_check"
                                    name="special_needs_check" type="checkbox" checked="checked" /><span
                                    class="slider"></span>
                            </label>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="program">Programas</label>
                            <select class="form-control form-control-rounded" id="programs" name="programs">
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="special_needs">Necessidades Especiais</label>
                            <select class="form-control form-control-rounded" id="special_needs" name="special_needs">
                                @foreach ($special_needs as $special_need)
                                    <option value="{{ $special_need->id }}">{{ $special_need->name }}</option>
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
    {{-- <h3 class="border-bottom border-gray pb-2">Step 1 Content</h3>Lorem Ipsum is simply
    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
    the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
    not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
    desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. --}}



@endsection
