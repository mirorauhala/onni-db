@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-content-center justify-content-center">
        <div class="col-3 pt-5">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Käyttäjänimi</label>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Salasana</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="password" required>
                </div>

                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Muista minut</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">
                    Login
                </button>

                <b-link class="d-block text-center text-muted" v-b-modal.passwordmodal>Unohditko salasanan?</b-link>

                <b-modal id="passwordmodal" title="Unohditko salasanan?" ok-only v-cloak>
                    <h1 class="h4">Helppo</h1>
                    <p>Sano opettajallesi. Hän voi palauttaa salasanan opettajan tilillä.</p>

                    <b-link class="h4 d-block text-decoration-none" v-b-toggle.advanced variant="primary">Edistynyt</b-link>
                    <b-collapse id="advanced" class="mt-2">
                        <p>Salasanan pakottaminen uudeksi on mahdollista SSH yhteydellä. Suorita seuraavat komennot:</p>
                        <p>
                            <code class="d-block">cd /var/www/onni</code>
                            <code class="d-block">php artisan onni:reset &lt;KÄYTTÄJÄNIMI&gt;</code>
                        </p>
                        <p>Satunnainen salasana asetetaan komennon suorittamisen jälkeen.</p>
                    </b-collapse>
                </b-modal>
            </form>
        </div>
    </div>
</div>
@endsection
