@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Formulários para edição das informações do Discente {{ $student->person->name }}
            </h4>

            <div class="row">
                <!-- ICON BG-->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('students.editRegistrationStudent',['student' => $student, 'registration'=> $registration]) }}">
                            <div class="card-body text-center"><i class="i-Add-User"></i>
                                <p class="text-muted mt-3 mb-0">Edição</p>
                                <p class="text-primary text-18 line-height-1 mb-2">Dados Principais do Aluno</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <a href="{{ route('anamneses.edit',$registration) }}">
                            <div class="card-body text-center"><i class="i-Financial"></i>
                                <p class="text-muted mt-2 mb-0"> </p>
                                <p class="text-primary text-18 line-height-1 mb-2">Realizar Anamnese</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Editar Endereço</p>
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
