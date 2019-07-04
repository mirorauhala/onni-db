@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Luo uusi kategoria</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('category.new') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category">Kategoria</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}">

                            @if ($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-primary" value="Luo">
                    </form>

                </div>
            </div>
        </div>

        @include('partials.categories-menu')
    </div>
</div>
@endsection
