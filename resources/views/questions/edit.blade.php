@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />
<div class=row>
    <div class="col-md-12">
        <div class="card text-left">
            <form method="post" action="{{ route('anamneses.update', $student) }}" class="needs-validation" novalidate="novalidate">
                @method('put')
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-3">Anamnesia do aluno(a): <b>{{ $student->person->name }}</b></h4>
                    <div class="separator-breadcrumb border-top"></div>
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($questions as $question)
                                        @if($question->description ==='Tipo de parto?')
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="{{ $question->id }}">{{ $question->description }}</label>
                                                <select class="form-control form-control-rounded" name="{{ $question->id }}" id="{{ $question->id }}" autofocus>
                                                    <option value="" selected disabled>----Selecione o tipo de parto----</option>
                                                    <option value=0
                                                        @if($booleanQuestions->where('description', 'Tipo de parto?')->first() != null&&$booleanQuestions->where('description', 'Tipo de parto?')->first()->pivot->value===false)
                                                            selected
                                                        @endif
                                                        >Cesária</option>
                                                    <option value=1
                                                        @if($booleanQuestions->where('description', 'Tipo de parto?')->first()!=null&&$booleanQuestions->where('description', 'Tipo de parto?')->first()->pivot->value===true)
                                                            selected
                                                        @endif
                                                        >Normal</option>
                                                </select>
                                            </div>
                                        @elseif($question->type ==='textual')
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="{{ $question->id }}">{{ $question->description }}</label>
                                                <input class="form-control form-control-rounded" id="{{ $question->id }}" name="{{ $question->id }}" type="text"
                                                    @if($textualQuestions->where('id',$question->id)->first() != null)
                                                        value ="{{ $textualQuestions->where('id', $question->id)->first()->pivot->value}}"
                                                    @endif/>
                                            </div>
                                        @elseif($question->type === 'trueFalse')
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="{{ $question->id }}">{{ $question->description }}</label>
                                                <select class="form-control form-control-rounded" name="{{ $question->id }}" id="{{ $question->id }}">
                                                    <option selected disabled>----Selecione----</option>
                                                    <option value=0
                                                        @if($booleanQuestions->where('id', $question->id)->first()!=null&&$booleanQuestions->where('id', $question->id)->first()->pivot->value===false)
                                                            selected
                                                        @endif
                                                    >Não</option>
                                                    <option value=1
                                                        @if($booleanQuestions->where('id', $question->id)->first() != null&&$booleanQuestions->where('id', $question->id)->first()->pivot->value===true)
                                                            selected
                                                        @endif
                                                    >Sim</option>
                                                </select>
                                            </div>
                                        @elseif($question->type === 'scalar2')
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="{{ $question->id }}">{{ $question->description }}</label>
                                                <select class="form-control form-control-rounded" name="{{ $question->id }}" id="{{ $question->id }}">
                                                    <option selected disabled>----Selecione----</option>
                                                    <option value=1
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="1")
                                                            selected
                                                        @endif
                                                    >Própria</option>
                                                    <option value=2
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="2")
                                                            selected
                                                        @endif
                                                    >Cedida</option>
                                                    <option value=3
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="3")
                                                            selected
                                                        @endif
                                                    >Alugada</option>
                                                </select>
                                            </div>
                                        @elseif($question->type === 'scalar1')
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="{{ $question->id }}">{{ $question->description }}</label>
                                                <select class="form-control form-control-rounded" name="{{ $question->id }}" id="{{ $question->id }}">
                                                    <option value="" selected disabled>----Selecione----</option>
                                                    <option value=1
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="1")
                                                            selected
                                                        @endif
                                                    >Para se socializar</option>
                                                    <option value=2
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="2")
                                                            selected
                                                        @endif
                                                    >Para a mãe trabalhar fora</option>
                                                    <option value=3
                                                        @if($scaleQuestions->where('type', $question->type)->first() != null&&$scaleQuestions->where('type', $question->type)->first()->pivot->value==="3")
                                                            selected
                                                        @endif
                                                    >Por orientação médita</option>
                                                </select>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('students.editForm', $student) }}" class="btn btn-outline-secondary m-1" type="button">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
