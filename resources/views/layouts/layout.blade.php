<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Li Ming Gao Rickie and Asher" />

        <link href="{{ asset('css/app2.css') }}" rel="stylesheet">

        <title>mingle</title>
        
    </head>
    <body style="background:#DEF2F1;">
        <nav class="navbar navbar-custom navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" >
                    <p class="logo">mingle</p>
                </a>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    @guest
                        <ul class="navbar-nav navbar-left">
                            <li class="nav-item active mx-2">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                     
                        <ul class="navbar-nav navbar-right ml-auto">
                            <li class="nav-item mx-2" href="{{ route('login') }}">
                                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                            </li>
                            <li class="nav-item mx-2" href="{{ route('register') }}">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav navbar-left">
                            <li class="nav-item active mx-2">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">Quick Match</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="{{route('post.index')}}">Board</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">Request</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav navbar-right ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre >
                                    <img src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:absolute; top:0px; left:0px; border-radius:50%">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('changePw') }}">
                                        Change Password
                                    </a>
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
                        </ul>

                    @endguest
                </div>
            </div>
        </nav>

        <div id="app">
            @yield('content')
        </div>

        <footer class="footer d-flex align-items-center">
            <div class="container">
                <div class="d-flex col-12 justify-content-center">
                <p>Project Mingle - Orbital 2021</p>
            </div>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
