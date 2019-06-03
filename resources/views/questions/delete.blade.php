@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Delete question</h5>
                    <p>Are you sure you want to delete the following question and its answers? This action cannot be undone.</p>

                    <p><b>{{ $question->question }}</b></p>
                    <form method="post" action="{{ route('question.delete', ['question' => $question->id]) }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger btn-block" value="Remove">
                        <a class="btn btn-light btn-block" href="{{ route('question.all') }}">Take me back to safety</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
