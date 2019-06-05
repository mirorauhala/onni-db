@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-content-center justify-content-center">
        <div class="col-3 pt-5">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="password" required>
                </div>

                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">
                    Login
                </button>
                <a class="d-block text-center text-muted" href="#">
                    Forgot Your Password?
                </a>
                <!-- TODO: make a artisan command for changing the password. -->
            </form>
        </div>
    </div>
</div>
@endsection
