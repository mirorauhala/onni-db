@extends('layouts.app')

@section('content')
<div class="container">
    <header class="row pt-5 pb-4">
        <div class="col-12">
            <h1 class="text-center">Asetukset</h1>
        </div>
    </header>
    <div class="row justify-content-center">
        <div class="col-12 col-md-5">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tili</h5>
                    <p class="card-text">Tee muutoksia tiliisi.</p>
                    <a href="{{ route('settings.account') }}" class="btn btn-primary px-4">Aloitetaan</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Turvallisuus</h5>
                    <p class="card-text">Tee muutoksia salasanaan.</p>
                    <a href="{{ route('settings.password') }}" class="btn btn-primary px-4">Aloitetaan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
