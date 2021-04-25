@extends('layouts.home')

@section('content')
    <x-alerts.validation-errors :errors="$errors" />
    <x-alerts.sucess :message="session('message')" />
    <x-alerts.info :problem="session('problem')" />
    <div class="col-md-12">
        <div class="card text-left">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Vacina Tomadas pelos Alunos</div>
                            <form action="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="checkbox checkbox-info">
                                            <input class="form-control form-control-rounded" type="checkbox" id=""
                                                name="" /><span></span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @foreach ($vaccines as $vaccine)
                                        <div class="col-md-6 form-group mb-3">
                                            <input name="id_vaccine" class="form-control form-control-rounded"
                                                id="id_vaccine" value="{{ $vaccine->name }}" type="text" name="id_vaccine"
                                                placeholder="" />
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Documentos Apresentados</div>
                            <form action="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="checkbox checkbox-info">
                                            <input class="form-control form-control-rounded" type="checkbox" id=""
                                                name="" /><span>Histórico Escolar</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
