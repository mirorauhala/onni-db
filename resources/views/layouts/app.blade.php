<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="pt-5 mt-4">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('question.all') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item{{ active(['question*']) }}"><a class="nav-link" href="{{ route('question.all') }}">Questions</a></li>
                        <li class="nav-item{{ active(['category*']) }}"><a class="nav-link" href="{{ route('category.all') }}">Categories</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        @if (Auth::guest())
                            <li class="nav-item{{ active(['login*']) }}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item{{ active(['register*']) }}"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
