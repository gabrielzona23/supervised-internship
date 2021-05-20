@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Formulários para edição e inclusão das informações do discente <b>{{ $student->person->name }}</b>
            </h4>
            {{-- <a class="btn btn-outline-info btn-sm m-1"
                href="{{ route('students.edit',$student) }}" type="button">Informações</a> --}}
                                            {{-- <a class="btn btn-outline-danger btn-sm m-1"
                                                href="{{ route('anamneses.edit',$student) }}" type="button">Anamnese</a> --}}
                                            {{-- <a class="btn btn-outline-secondary btn-sm m-1"
                                                href="{{ route('address.createAddressStudent',$student) }}" type="button">Endereço</a>
                                            <a class="btn btn-outline-primary btn-sm m-1"
                                                href="{{ route('attendedSchool.create',$student) }}" type="button">Escolas Frequentandas</a> --}}
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('students.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-File-Edit"></i>
                                <p class="text-muted mt-3 mb-0">Edição</p>
                                <p class="text-primary text-18 line-height-1 mb-2">Informações pessoais</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('address.createAddressStudent',$student) }}">
                            <div class="card-body text-center"><i class="i-Green-House"></i>
                                <p class="text-muted mt-2 mb-0">Gerenciar</p>
                                <p class="text-primary text-18 line-height-1 mb-2"> Endereço</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('attendedSchool.create',$student) }}">
                            <div class="card-body text-center"><i class="i-University"></i>
                                <p class="text-muted mt-2 mb-0">Gerenciar</p>
                                <p class="text-primary text-18 line-height-1 mb-2"> Escolas Frequentandas</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('anamneses.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-Clinic"></i>
                                <p class="text-muted mt-2 mb-0">Saúde do aluno</p>
                                <p class="text-primary text-18 line-height-1 mb-2">Anamnese</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a
                        {{-- href="{{ route('students.editRegistrationStudent',['student' => $student, 'registration'=> $registration]) }}">

            <div class="card-body text-center"><i class="i-Add-User"></i>
                <p class="text-muted mt-3 mb-0">Edição</p>
                <p class="text-primary text-18 line-height-1 mb-2">Dados Principais do Aluno</p>
            </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center"><i class="i-Financial"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Sales</p>
                    <p class="text-primary text-24 line-height-1 mb-2">$4021</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Orders</p>
                    <p class="text-primary text-24 line-height-1 mb-2">80</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center"><i class="i-Money-2"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Expense</p>
                    <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
