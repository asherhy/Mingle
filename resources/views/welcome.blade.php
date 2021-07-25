@extends( (Auth::check()) ? (Auth::user()->allRoles()->contains('student') ? 'layouts.layout' :'layouts.mentor-layout') : 'layouts.layout')

@section('content')


<div class="container min-vh-100">

    <div class="row ml-5 welcome-page pb-0" id="home" >
        <div class="col-md-3" >
            <div class="d-flex justify-content-center">
                <h1 style="color:#008080">Mingle is packed with features</h1>
            </div>
            <div class="d-flex justify-content-center">
            <a href="#section2"><button class="original-btn welcome-btn welcome-btn-3">More Info</button></a>
            </div>
        </div>
        <div class="col-md-9 mt-5">
            <img class="img-fluid"
                    src="{{ asset('images/welcome.vector.png') }}">
        </div>
        
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cccc" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,176C384,149,480,107,576,96C672,85,768,107,864,133.3C960,160,1056,192,1152,170.7C1248,149,1344,75,1392,37.3L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<div class="container-fluid" id="section2" style="background-color: #00cccc;">
    <div class="row ml-5 mr-5 welcome-page">
        <div class="col-md-12">
            <div  class="d-flex justify-content-center">
                <h1 class="text-light">Connecting you<br>with the people<br> you need</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h3 class="text-light">Mingle is an online tool that helps students find<br> study groups, module project groups and mentors.</h3>
            </div>
            <div class="d-flex picture justify-content-center">
                <img class="img img-thumbnail"
                    src="{{ asset('images/connected-dots-teal.png') }}" alt="connected-dots">
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cccc" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,149.3C384,107,480,85,576,90.7C672,96,768,128,864,160C960,192,1056,224,1152,208C1248,192,1344,128,1392,96L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

<div class="container-fluid" id="about">
    <div class="row ml-5 mr-5 welcome-page">
        <div class="col-md-12">
            <div  class="d-flex justify-content-center">
                <h1 class="text-muted">Some Information<br> About Us...</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h3 class="text-muted">
                    As of March 2020, the world officially became pandemic-struck and it became difficult<br>
                    for people to connect with each other. As students who began their university lives in 2020,<br>
                    we believe our social and academic lives should not be compromised. Hence, we decided to<br>
                    take Orbital 2021 as a chance to develop a reactive web application that would help students<br>
                    connect with each other and create mutually beneficial relationships that last.
                </h3>
            </div>
            <div class="d-flex picture justify-content-center">
                <img class="img img-thumbnail"
                    src="{{ asset('images/connected-dots-teal.png') }}" alt="connected-dots">
            </div>
        </div>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cccc" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,234.7C384,235,480,213,576,170.7C672,128,768,64,864,37.3C960,11,1056,21,1152,32C1248,43,1344,53,1392,58.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<div class="container-fluid" id="help" style="background-color: #00cccc;">
    <div class="row ml-5 mr-5 welcome-page">
        <div class="col-md-12">
            <div  class="d-flex justify-content-center">
                <h1 class="text-light">Having trouble or have any<br> questions about the features? </h1>
            </div>
            <div class="d-flex justify-content-center">
                <h3 class="text-light">
                    Drop us an email at OrbitalMingle@gmail.com with your questions and we'll try to reach<br>
                    out as soon as possible! &#128512;<br>
                    Alternatively, you can check out our user guide on <a href="https://github.com/asherhy/Mingle">github</a>
                </h3>
            </div>
            <div class="d-flex picture justify-content-center">
                <img class="img img-thumbnail"
                    src="{{ asset('images/connected-dots-teal.png') }}" alt="connected-dots">
            </div>
        </div>
    </div>
</div>
@stop