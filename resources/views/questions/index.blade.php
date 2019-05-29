@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(count($questions))
                {{ $questions->links() }}
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Difficulty</th>
                            <th>Is enabled?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->difficulty }}</td>
                                <td>{{ $question->is_enabled ? 'Yes' : 'No' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('question.edit', ['question' => $question->id]) }}">Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('question.delete', ['question' => $question->id]) }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $questions->links() }}
            @else
                <p>There are no questions.</p>
            @endif
        </div>
    </div>
</div>
@endsection
