@extends('layouts.home')

@section('content')
    <x-alerts.validation-errors :errors="$errors"/>
    <x-alerts.sucess :message="session('message')"/>
    <x-alerts.info :problem="session('problem')"/>

    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Cadastro inicial do Aluno</h4>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="home-basic-tab" data-toggle="tab"
                                href="#homeBasic" role="tab" aria-controls="homeBasic" aria-selected="true">Aluno</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-basic-tab" data-toggle="tab"
                                href="#profileBasic" role="tab" aria-controls="profileBasic"
                                aria-selected="false">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-basic-tab" data-toggle="tab"
                                href="#contactBasic" role="tab" aria-controls="contactBasic"
                                aria-selected="false">Endereço</a></li>
                        <li class="nav-item"><a class="nav-link" id="about-tab" data-toggle="tab" href="#about"
                                aria-controls="about" aria-selected="false">Responsável</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="homeBasic" role="tabpanel"
                            aria-labelledby="home-basic-tab">
                            <x-forms.student :programs="$programs" :special_needs="$special_needs" />
                        </div>
                        <div class="tab-pane fade" id="profileBasic" role="tabpanel" aria-labelledby="profile-basic-tab">
                            <x-forms.document :programs="$programs" :special_needs="$special_needs"/>
                        </div>
                        <div class="tab-pane fade " id="contactBasic" role="tabpanel" aria-labelledby="contact-basic-tab">
                            <x-forms.address />
                        </div>
                        <div class="tab-pane" id="about" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">
                            <x-forms.responsibly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
