@extends('layouts.guest')
@section('content')
<div class="auth-layout-wrap img-teste">
    <div class="auth-content">
        <x-alerts.validation-errors :errors="$errors" />
        <x-alerts.sucess :message="session('message')" />
        <x-alerts.info :problem="session('problem')" />
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 text-center img-forms">
                    <div class="pl-3 auth-right">
                        <div class="auth-logo text-center mt-4">
                            <span style="font-size:20px">
                                <Strong>Dom Bosco</Strong>
                            </span>
                        </div>
                          <h5><b>Já possui cadastro? Entre no sistema agora!</b></h5>
                        <div class="flex-grow-1">
                        </div>
                        <div class="w-100 mb-4">
                            <a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="{{ route('login') }}">
                                <i class="i-Mail-with-At-Sign"></i>Entre no sistema com seu email
                            </a>
                        </div>
                        <div class="flex-grow-1">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4">
                        <h1 class="mb-3 text-18">Cadastro de usuário</h1>
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="email" type="email" name="email" placeholder="Digite seu email" required value="{{ old('email') }}" autofocus>
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo Email não pode ser vazio!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Seu nome</label>
                                <input class="form-control form-control-rounded" id="name" type="text" name="name" placeholder="Digite o seu nome" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="nickname">Nome de usuário</label>
                                <input class="form-control form-control-rounded" id="nickname" type="text" name="nickname" placeholder="Digite seu nick" value="{{ old('nickname') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="password" type="password" name="password" placeholder="Escolha sua senha" required value="{{ old('password') }}" autocomplete="new-password" >
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo Senha não pode ser vazio!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirme sua senha<span style="font-size:13px; color:red;">*</span></label>
                                <input class="form-control form-control-rounded" id="password_confirmation" type="password" placeholder="Repita sua senha" required name="password_confirmation" required>
                                <div class="valid-feedback">
                                    Tudo Ok!
                                </div>
                                <div class="invalid-feedback">
                                    O campo de confirmação não pode ser vazio!
                                </div>
                            </div>
                            <a class="btn  btn-rounded btn-light mt-3" href="{{ route('login') }}">
                                Voltar para o login
                            </a>
                            <button type="submit" class="btn btn-primary btn-rounded mt-3">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
