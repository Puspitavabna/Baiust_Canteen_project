@extends('layouts.app')

@section('content')

    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('user.post.register') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
            <input id="name" placeholder="Full Name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="email" class="col-md-4 col-form-label text-md-right">User Type</label>
            <select class="form-control" id="user_type_id" name="user_type_id">
                <option value="" >Select </option>
                @foreach($user_types as $user_type)
                    <option value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group has-feedback">
            <label for="email" >Departments</label>
            <select class="form-control" id="department_id" name="department_id">
                <option value="" >Select </option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>


    <p>I already have a membership <a href="{{ route('user.sign_in') }}" class="text-center">Sign In</a></p>
@endsection
