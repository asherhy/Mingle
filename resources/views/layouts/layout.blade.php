<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Li Ming Gao Rickie and Asher" />

        <link href="{{ asset('css/new-app.css') }}" rel="stylesheet">

        <title>mingle</title>
        
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top mx-auto px-0;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" >
                    <p class="logo">mingle</p>
                </a>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    @guest
                    <ul class="navbar-nav mx-auto">
                            <li class="nav-item mx-4">
                                <a class="nav-link under px-0 active" href="#">Home</a>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link under px-0" href="#">About</a>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link under px-0" href="#">Help</a>
                            </li>
                        </ul>
                     
                        <ul class="navbar-nav" style="margin-left:30px;">
                            <li class="nav-item mx-4" href="{{ route('login') }}">
                                <a class="nav-link under" href="{{ route('login') }}">Sign In</a>
                            </li>
                            <li class="nav-item mx-4" href="{{ route('register') }}">
                            <a class="nav-link under" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item mx-4">
                                <a class="nav-link under" href="{{ route('quickmatch.module.create') }}">QuickMatch</a>
                            </li>
                            <li class="nav-item dropdown mx-4">
                                <a class="nav-link under" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Board <i class="fas fa-caret-down pl-1"></i></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width:200px;">
                                    <a class="dropdown-item" href="{{route('post.index')}}">All Posts</a>
                                    <a class="dropdown-item" href="{{route('post.myposts')}}">My Posts</a>
                                </div>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link under" href="{{ route('request.post.index') }}">Request</a>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link under" href="{{ route('group.index') }}">Groups</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav" style="margin-left:30px;">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre >
                                    <img src="{{ asset('storage/avatars/'.Auth::user()->avatar)}}" style="width:40px; height:40px; position:absolute; top:0px; left:0px; border-radius:50%">
                                    {{ Auth::user()->name }}<i class="fas fa-caret-down pl-2"></i>
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
        @yield('js')
    </body>
</html>
