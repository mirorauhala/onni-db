@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">User management</div>

                    <div class="panel-body">
                        <ul>
                            @foreach($users as $user)
                                <li><a href="{{ route('users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
            @include('partials.users-menu')
        </div>
    </div>
@endsection
