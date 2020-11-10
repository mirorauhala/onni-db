@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">User management / Edit</div>

                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}" id="name" name="name" autocomplete="name">

                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" id="Email" name="Email" autocomplete="email">

                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" autocomplete="current-password">

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group d-flex">
                                <input type="submit" class="btn btn-primary px-4" value="Update">

                                @if($user->id != auth()->user()->id)
                                    <user-delete-button
                                        action="{{ route('users.destroy', ['íd' => $user->id]) }}"
                                        csrf="{{ csrf_token() }}">
                                        Delete
                                    </user-delete-button>
                                @endif
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            @include('partials.users-menu')
        </div>
    </div>
@endsection
