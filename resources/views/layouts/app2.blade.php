<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: 20px;
            border: black solid 1px;
            padding: 1%;
        }
        a{
            font-weight: bold;
            color: black;
        }
        .main {
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="row">
        <div class="col-12 py-3">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif

                            @else
                                <li class="nav-item">

                                </li>

                                <li class="nav-item">
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('bidders.index') }}">{{ __('Bidders') }}</a>
                                        <a class="dropdown-item" href="{{ route('bidders.create') }}">{{ __('New Bidders') }}</a>
                                        <hr>
                                        <a class="dropdown-item" href="{{ route('items.index') }}">Items</a>
                                        <a class="dropdown-item" href="{{ route('items.create') }}">New item</a>
                                        <a class="dropdown-item" href="#">User items</a>
                                        <hr>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-1  py-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-home"></i> Home
            </a><br>
            <hr>
                @auth
                <a href="{{ url('/all-bidders') }}" class=" underline"><i class="fas fa-users"></i> Bidders</a><br>
                <hr>
                    <a href="{{ url('/bidders') }}" class=" underline"><i class="fas fa-user"></i> {{ auth()->user()->name }}'s items</a><br>
                <hr>
                    <a  href="{{ route('items.create') }}"><i class="fas fa-plus-square"></i> Sale item</a><br> <hr>
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a><br> <hr>
                @endauth
                @guest
                    <p>To be able to buy, sale or list your items you must login first!</p>
                    <a  href="{{ route('login') }}">{{ __('Login') }}</a><br> <hr>
                    <a href="{{ route('register') }}" >Register Bidder</a><br> <hr>
                @endguest
            </div>
        <div class="main col-11">
            @include('flash-massage')
            @yield('content')
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-3 bg-danger">
            <div class="text-center">
               <strong>All rights reserved by SJ 2020</strong><br>
                Laravel Build v{{ Illuminate\Foundation\Application::VERSION }}
            </div>
        </div>
    </div>
    </div>
</body>
</html>
