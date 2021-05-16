
@extends('layouts.guest')
@section('content')
<div class="auth-layout-wrap img-teste">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="../../dist-assets/images/logo.png" alt=""></div>
                        <h1 class="mb-3 text-18">Forgot Password</h1>
                        <form action="">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control form-control-rounded" id="email" type="email">
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3">Reset Password</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="signin.html">
                                <u>Sign in</u></a></div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
                    <div class="pr-3 auth-right"><a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded"><i class="i-Google-Plus"></i> Sign in with Google</a><a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded"><i class="i-Facebook-2"></i> Sign in with Facebook</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection