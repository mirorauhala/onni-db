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

                <b-link class="d-block text-center text-muted" v-b-modal.passwordmodal>Forgot Your Password?</b-link>
                
                <b-modal id="passwordmodal" title="Forgot Your Password?" ok-only v-cloak>
                    <h1 class="h4">Easy</h1>
                    <p>Ask your teacher. They can easily reset the password using teacher account.</p>

                    <b-link class="h4 d-block text-decoration-none" v-b-toggle.advanced variant="primary">Advanced</b-link>
                    <b-collapse id="advanced" class="mt-2">
                        <p>To force reset a password for a given account, you need to SSH into the server and run the following command:</p>
                        <p>
                            <code class="d-block">cd /var/www/onni</code>
                            <code class="d-block">php artisan onni:reset &lt;USERNAME&gt;</code>
                        </p>
                        <p>A random password will be set after running the command.</p>
                    </b-collapse>                    
                </b-modal>
            </form>
        </div>
    </div>
</div>
@endsection
