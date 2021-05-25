@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Formulários para edição e inclusão das informações da matricula do ano <b>{{ $registration->dateFormatYear() }}</b>
             referente ao discente <b>{{ $registration->student->person->name }}</b>
            </h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('students.editRegistrationStudent', $registration) }}">
                            <div class="card-body text-center"><i class="i-File-Edit"></i>
                                <p class="text-primary text-16 line-height-1 mb-2">Dados do Aluno</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('responsible.create', $registration) }}">
                            <div class="card-body text-center"><i class="i-Business-ManWoman"></i>
                                <p class="text-primary text-16 line-height-1 mb-2">Responsáveis</p>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('vaccine.create',$registration) }}">
                            <div class="card-body text-center"><i class="i-Clinic"></i>
                                <p class="text-primary text-16 line-height-1 mb-2">Vacinas</p>
                            </div>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
