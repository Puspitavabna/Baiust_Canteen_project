@extends('layouts.app')

@section('content')
<p class="login-box-msg">Sign in to start your session</p>

<form action="{{ route('user.sign_in') }}" method="post">
    @csrf
    <div class="form-group has-feedback">
        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember  Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
    </div>

<!-- /.social-auth-links -->

<a href="#">I forgot my password</a><br>
    Register a new membership <a href={{ route('user.sign_up') }} class="text-center">Sign Up</a>

@endsection
