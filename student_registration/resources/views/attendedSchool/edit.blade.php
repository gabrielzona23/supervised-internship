@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('attendedSchool.update', $student) }}" class="needs-validation" novalidate="novalidate">
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
                                        <option>Creche</option>
                                        <option>Pré-escola</option>
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
                                    <label for="adminstrative_department">Dep. Adminstrativa</label>
                                    <input class="form-control form-control-rounded" id="adminstrative_department" type="text"
                                        name="adminstrative_department" placeholder="" value="{{ old('adminstrative_department')}}"/>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-primary">Salvar</button>
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
@endsection
