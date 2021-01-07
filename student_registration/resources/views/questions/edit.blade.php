@extends('layouts.home')

@section('content')
<x-alerts.validation-errors :errors="$errors" />
<x-alerts.sucess :message="session('message')" />
<x-alerts.info :problem="session('problem')" />

<div class="col-md-12">
    <div class="card text-left">
        <form method="post" action="{{ route('anamneses.update', $registration) }}" class="needs-validation"
            novalidate="novalidate">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-3">Anamnesia do Aluno(a) {{ $student->person->name }}</h4>
                <div class="separator-breadcrumb border-top"></div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Anamnesia do Aluno(a)
                            </div>
                            <div class="row">
                                @foreach ($questions as$question)
                                @if($question->type ==='textual')
                                <div class="col-md-6 form-group mb-3">
                                    <label for="{{ $question->id }}">{{ $question->description }}</label>
                                    <input class="form-control form-control-rounded" id="{{ $question->id }}"
                                        name="{{ $question->id }}" type="text" />
                                </div>
                                @elseif($question->type === 'trueFalse')
                                <div class="col-md-6 form-group mb-3">
                                    <label for="{{ $question->id }}">{{ $question->description }}</label>
                                    <select class="form-control form-control-rounded" name="{{ $question->id }}"
                                        id="{{ $question->id }}">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value=0>Não</option>
                                        <option value=1>Sim</option>
                                    </select>
                                </div>
                                @elseif($question->type === 'trueFalse')
                                <div class="col-md-6 form-group mb-3">
                                    <label for="{{ $question->id }}">{{ $question->description }}</label>
                                    <select class="form-control form-control-rounded" name="{{ $question->id }}"
                                        id="{{ $question->id }}">
                                        <option value="" selected disabled>----Selecione----</option>
                                        <option value=0>Não</option>
                                        <option value=1>Sim</option>
                                    </select>
                                </div>
                                @endif
                                @endforeach
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
