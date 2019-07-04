@extends('layouts.app')

@section('content')
<div class="container">
    <header class="row pt-5 pb-4">
        <div class="col-12">
            <h1 class="text-center">Asetukset / Turvallisuus</h1>
        </div>
    </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('settings.password') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="current_password">Nykyinen salasana</label>
                            <input type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" id="current_password" name="current_password" autocomplete="current-password" required>

                            @if ($errors->has('current_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="new_password">Uusi salasana</label>
                            <input type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" id="new_password" name="new_password" aria-describedby="passwordHelpBlock" autocomplete="new-password" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Salasanasi täytyy olla vähintään 8 merkkiä pitkä.
                            </small>

                            @if ($errors->has('new_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new_password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="newPassConfirm">Uuden salasanan vahvistus</label>
                            <input type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" id="newPassConfirm" name="new_password_confirmation" autocomplete="new-password" required>

                            @if ($errors->has('new_password_confirmation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new_password_confirmation') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary px-4" value="Muuta">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
