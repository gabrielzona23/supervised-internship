<<<<<<< HEAD
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
=======
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
                                <input class="form-control form-control-rounded" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus >
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo Email não pode ser vazio!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="password" type="password" name="password" required autocomplete="current-password" >
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
                            <button class="btn btn-rounded btn-primary btn-block mt-2 type="submit" >Entrar</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a class="text-muted" href="{{ route('password.request') }}">
                                <u>Esqueceu sua Senha</u>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center img-forms">
                    <div class="pr-3 auth-right">
                        <h6>Não possui cadastro? Se cadastre agora!</h6>
                        <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="{{ route('register') }}">
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
>>>>>>> 7f50c616d857cdc54f2b730bf0ee33d1fc1c82a9
