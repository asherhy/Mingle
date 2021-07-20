@extends('layouts.layout')

@section('content')


<div class="container min-vh-100">
    <div class="row welcome-page">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <h1 class="text-dark">Connecting you<br>with the people<br> you need</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h3 class="text-dark">Mingle is an online tool that helps students find<br> study groups, module project groups and mentors.</h3>
            </div>
            <div class="d-flex picture justify-content-center">
                <img class="img img-thumbnail"
                    src="{{ asset('images/connected-dots-teal.png') }}" alt="connected-dots">
            </div>
        </div>
    </div>
</div>

@stop