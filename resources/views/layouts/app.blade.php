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
            <b-navbar toggleable="sm" variant="light" fixed="top">
                <b-navbar-brand href="{{ route('question.all') }}">{{ config('app.name') }}</b-navbar-brand>
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <b-nav-item href="{{ route('question.all') }}" {{ active(['question*']) }}>{{ __('nav.questions') }}</b-nav-item>
                        <b-nav-item href="{{ route('category.all') }}" {{ active(['category*']) }}>{{ __('nav.categories') }}</b-nav-item>
                    </b-navbar-nav>

                    <b-navbar-nav class="ml-auto">
                        @if (Auth::guest())
                            <b-nav-item href="{{ route('login') }}" {{ active(['login*']) }}>{{ __('nav.login') }}</b-nav-item>
                        @else
                            <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                                <b-dropdown-item href="{{ route('settings') }}">Settings</b-dropdown-item>
                                <b-dropdown-item href="#"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ __('nav.logout') }}</b-dropdown-item>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </b-nav-item-dropdown>
                        @endif
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>

            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
