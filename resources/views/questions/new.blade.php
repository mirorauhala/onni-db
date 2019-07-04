@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Lisää uusi kysymys</div>

                <div class="panel-body">
                    @if(count($categories) > 0)
                        <form method="post" action="{{ route('question.create') }}" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category">Kategoria</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ ($category->id == old('category')) ? 'selected=selected' : '' }}>{{ $category->category }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                <label for="question">Kysymys</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question') }}">

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('question_enabled') ? ' has-error' : '' }}">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="question_enabled" value="1" checked="true">
                                        Onko kysymys käytössä?
                                    </label>
                                </div>

                                @if ($errors->has('question_enabled'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question_enabled') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('difficulty') ? ' has-error' : '' }}">
                                <label for="difficulty">Vaikeusaste</label>
                                <select class="form-control" name="difficulty">
                                    <option value="1" {{ (1 == old('difficulty')) ? 'selected=selected' : '' }}>1</option>
                                    <option value="2" {{ (2 == old('difficulty')) ? 'selected=selected' : '' }}>2</option>
                                    <option value="3" {{ (3 == old('difficulty')) ? 'selected=selected' : '' }}>3</option>
                                </select>

                                @if ($errors->has('difficulty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('difficulty') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('answer1') ? ' has-error' : '' }}">
                                <label for="answer1">Vastaus 1 <small>Tämän on oltava oikea vastaus</small></label>
                                <input type="text" class="form-control" name="answer1" value="{{ old('answer1') }}">

                                @if ($errors->has('answer1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('answer2') ? ' has-error' : '' }}">
                                <label for="answer2">Vastaus 2</label>
                                <input type="text" class="form-control" name="answer2" value="{{ old('answer2') }}">

                                @if ($errors->has('answer2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('answer3') ? ' has-error' : '' }}">
                                <label for="answer3">Vastaus 3</label>
                                <input type="text" class="form-control" name="answer3" value="{{ old('answer3') }}">

                                @if ($errors->has('answer3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('answer4') ? ' has-error' : '' }}">
                                <label for="answer4">Vastaus 4</label>
                                <input type="text" class="form-control" name="answer4" value="{{ old('answer4') }}">

                                @if ($errors->has('answer4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer4') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('explanation') ? ' has-error' : '' }}">
                                <label for="explanation">Oikean vastauksen selitys</label>
                                <input type="text" class="form-control" name="explanation" value="{{ old('explanation') }}">

                                @if ($errors->has('explanation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('explanation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="submit" class="btn btn-primary" value="Luo">
                        </form>
                    @else
                        <p>Kategorioita ei ole vielä luotu. Voit luoda uuden kategorian <a href="{{ route('category.new') }}">täällä</a>.</p>
                    @endif

                </div>
            </div>
        </div>

        @include('partials.questions-menu')
    </div>
</div>
@endsection
