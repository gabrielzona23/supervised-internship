@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Formulários para edição e inclusão das informações do Discente {{ $student->person->name }}
            </h4>

            <div class="row">
                <!-- ICON BG-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('students.editRegistrationStudent',['student' => $student, 'registration'=> $registration]) }}">
                            <div class="card-body text-center"><i class="i-File-Edit"></i>
                                <p class="text-muted mt-3 mb-0">Edição</p>
                                <p class="text-primary text-18 line-height-1 mb-2">Dados Principais do Aluno</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('anamneses.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-Clinic"></i>
                                <p class="text-muted mt-2 mb-0">Incluir ou editar  </p>
                                <p class="text-primary text-18 line-height-1 mb-2"> Anamnese</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('addresses.edit',$student) }}">
                            <div class="card-body text-center"><i class="i-Globe"></i>
                                <p class="text-muted mt-2 mb-0">Editar</p>
                                <p class="text-primary text-18 line-height-1 mb-2"> Editar Endereço</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('address.editAddressStudent',$student) }}">
                            <div class="card-body text-center"><i class="i-Edit-Map"></i>
                                <p class="text-muted mt-2 mb-0">Incluir Novo </p>
                                <p class="text-primary text-18 line-height-1 mb-2"> Novo Endereço</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ICON BG-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        {{-- <a --}}
                        {{-- href="{{ route('students.editRegistrationStudent',['student' => $student, 'registration'=> $registration]) }}">
                        --}}
                        <div class="card-body text-center"><i class="i-Add-User"></i>
                            <p class="text-muted mt-3 mb-0">Edição</p>
                            <p class="text-primary text-18 line-height-1 mb-2">Dados Principais do Aluno</p>
                        </div>
                        {{-- </a> --}}
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
            </div>
        </div>
    </div>
</div>
@endsection
