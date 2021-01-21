@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="POST" action="{{ route('attendedSchool.update', $attendedSchool) }}" class="needs-validation" novalidate="novalidate">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Vizulização da escola <b>{{ $attendedSchool->name}}</b> que o discente <b>{{ $attendedSchool->students[0]->person->name }}</b> frequentou</div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="year">Ano que o Aluno esteve na escola</label>
                                    <input class="form-control form-control-rounded" id="year" type="text" disabled name="year"
                                        value="{{ $attendedSchool->year}}" autofocus/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="school_grade">Série/Ano</label>
                                <input class="form-control form-control-rounded" id="school_grade" type="text" value="{{$attendedSchool->school_grade}}"
                                        disabled name="school_grade" required/>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="name">Escola</label>
                                    <input class="form-control form-control-rounded" id="name" type="text" disabled name="name" value="{{ $attendedSchool->name}}"
                                        required/>
                                    <div class="valid-feedback">
                                        Tudo Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        O campo acima não pode ser vazio
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="network">Rede</label>
                                    <select class="form-control form-control-rounded" disabled name="network" id="network">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value="Particular"
                                            @if($attendedSchool->network =="Particular")
                                                selected
                                            @endif
                                        >Particular</option>
                                        <option value="Público"
                                            @if($attendedSchool->network  =="Público")
                                                selected
                                            @endif
                                        >Público</option>
                                        <option value="Particular com bolsa"
                                            @if($attendedSchool->network =="Particular com bolsa")
                                                selected
                                            @endif
                                        >Particular com bolsa</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="type">Tipo</label>
                                    <select class="form-control form-control-rounded" disabled name="type" id="type">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option>Creche</option>
                                        <option>Pré-escola</option>
                                        <option value="Creche"
                                            @if($attendedSchool->type  =="Creche")
                                                selected
                                            @endif
                                        >Creche</option>
                                        <option value="Pré-escola"
                                            @if($attendedSchool->type  =="Pré-escola")
                                                selected
                                            @endif
                                        >Pré-escola</option>
                                        <option value="Ensino médio"
                                            @if($attendedSchool->type  =="Ensino médio")
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
                                    <input class="form-control form-control-rounded" id="city" type="text" disabled name="city"
                                       value="{{ $attendedSchool->city}}"/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="administrative_department">Dep. Administrativa</label>
                                    <input class="form-control form-control-rounded" id="administrative_department" type="text"
                                        disabled name="administrative_department"  value="{{ $attendedSchool->administrative_department}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('attendedSchool.create', $attendedSchool->students[0]) }}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
                    {{-- <button type="submit" class="btn btn-primary">Salvar</button> --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
