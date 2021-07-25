<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="Li Ming Gao Rickie and Asher Wang" />
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" >
        
        <link href="{{ asset('css/new-app.css') }}" rel="stylesheet">

        <title>mingle</title>
        
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md fixed-top mx-auto px-0;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" >
                  <img src="{{ asset('images/logo.png') }}" alt="" width="30" height="24">
                </a>
                <a class="navbar-brand pl-2" href="{{ route('home') }}" >
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
                                <a class="nav-link under px-0" href="#">Contact</a>
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
                                <a class="nav-link under {{Request::url() ==  route('mentor.mail') ? 'active' : ''}}" href="{{route('mentor.mail')}}">Mail</a>
                            </li>
                            <li class="nav-item mx-4">
                                <a class="nav-link under {{Request::url() ==  route('mentor.show.mentees') ? 'active' : ''}}" href="{{ route('mentor.show.mentees') }}">Mentees</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav" style="margin-left:30px;">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre >
                                <img src="{{Auth::user()->avatar}}" style="width:40px; height:40px; position:absolute; top:0px; left:0px; border-radius:50%">
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

        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section
                class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
            >
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Mingle
                    </h6>
                    <p>
                        We will connect you and make sure you pair with a solid groupmate.
                    </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Framework
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Bootstrap</a>
                    </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Credits
                    </h6>
                    <p>
                        <a href="http://www.freepik.com" class="text-reset">Freepik</a>
                    </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> NUS Orbital Mingle</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        OrbitalMingle@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i>8888 8888</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="">mingle.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>
