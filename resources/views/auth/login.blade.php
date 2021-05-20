@extends('layouts.guest')
@section('content')
<div class="auth-layout-wrap img-teste">
    <div class="auth-content">
        <x-alerts.validation-errors :errors="$errors" />
        <x-alerts.sucess :message="session('message')" />
        <x-alerts.info :problem="session('problem')" />
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <span style="font-size:20px">
                                <Strong>Dom Bosco</Strong>
                            </span>
                        </div>
                        <h1 class="mb-3 text-18">Login</h1>
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo Email não pode ser vazio!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="password" type="password" name="password" required autocomplete="current-password">
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo Senha não pode ser vazio!
                                </div>
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">Lembrar de mim</span>
                                </label>
                            </div>
                            <button class="btn btn-rounded btn-primary btn-block mt-2 type=" submit">Entrar</button>
                        </form>
                        <div class="mt-3 text-center">
                            {{-- <!-- <a class="text-muted" disabled href="{{ route('password.request') }}"> --> --}}
                            <a class="text-muted" href="#">
                                <u>Esqueceu sua Senha(disabilitado)</u>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center img-forms">
                    <div class="pr-3 auth-right">
                        <h6>Não possui cadastro? Se cadastre agora!</h6>
                        {{-- <!-- <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="{{ route('register') }}"> --> --}}
                        <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="#">
                            <i class="i-Mail-with-At-Sign"></i>
                            Se cadastre com seu email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
