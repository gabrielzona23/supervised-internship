@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Formulários para edição e inclusão das informações do discente <b>{{ $student->person->name }}</b>
            </h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('students.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-File-Edit"></i>
                                <p class="text-primary text-15 line-height-1 mb-2">Informações pessoais</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('address.createAddressStudent',$student) }}">
                            <div class="card-body text-center"><i class="i-Green-House"></i>
                                <p class="text-primary text-15 line-height-1 mb-2">Endereço</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('attendedSchool.create',$student) }}">
                            <div class="card-body text-center"><i class="i-University"></i>
                                <p class="text-primary text-15 line-height-1 mb-2">Escolas Frequentadas</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('anamneses.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-Clinic"></i>
                                <p class="text-primary text-15 line-height-1 mb-2">Anamnese</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
