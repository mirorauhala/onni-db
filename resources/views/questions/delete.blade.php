@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Poista kysymys</h5>
                    <p>Oletko varma, että haluat poistaa seuraavan kysymyksen ja sen vastaukset? Tätä toimintoa ei voi peruuttaa.</p>

                    <p><b>{{ $question->question }}</b></p>
                    <form method="post" action="{{ route('question.delete', ['question' => $question->id]) }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger btn-block" value="Kyllä, poista!">
                        <a class="btn btn-light btn-block" href="{{ route('question.all') }}">Vie minut takaisin</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
