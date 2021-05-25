@extends('layouts.home')

@section('content')
    <x-alerts.validation-errors :errors="$errors" />
    <x-alerts.sucess :message="session('message')" />
    <x-alerts.info :problem="session('problem')" />
    <div class="col-md-12">
        <div class="card text-left">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Vacinas Tomadas pelos Alunos</div>
                                <form method="POST" action="{{ route('vaccine.vaccineStudent', $registration) }}" class="needs-validation"
                                    novalidate="novalidate">
                                    @csrf
                                    @foreach ($vaccines as $vaccine)
                                    <div class="row" style="border-width: 1px;">
                                        <div class="col-md-6 form-group mb-3">
                                            <label class="checkbox checkbox-info">
                                                <input class="form-control form-control-rounded" type="checkbox" id=""
                                                    name="" /><span>{{ $vaccine->name }}</span><span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <input name="expiration_{{ $vaccine->id }}" class="form-control form-control-rounded"
                                                id="expiration{{ $vaccine->id }}" type="text" name="expiration{{ $vaccine->id }}" placeholder="Vencimento"/>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-12">
                                        <a href="{{ route('registrations.edit',$registration) }}" class="btn btn-secondary">Voltar</a>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Cadastrar nova Vacina</div>
                                <form method="POST" action="{{ route('vaccine.store') }}" class="needs-validation"
                                    novalidate="novalidate">
                                    @csrf
                                <div class="row">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
