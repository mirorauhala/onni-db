@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Poista kategoria!</div>

                <div class="panel-body">

                    <p>Oletko varma, että haluat poistaa kategorian ja kaikki sen kysymykset? Tätä toimintoa ei voi peruuttaa.</p>

                    <p><b>{{ $category->category }}</b></p>
                    <form method="post" action="{{ route('category.delete', ['category' => $category->id]) }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger btn-block" value="Kyllä, poista!">
                        <a class="btn btn-default btn-block">Vie minut takaisin</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
