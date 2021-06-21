@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center" style="padding-top: 150px;">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="card shadow">
                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <div class="row pt-2 pb-2">
                        <img class="my-auto ml-4" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:60px; height:60px; position:relative; border-radius:50%">
                        <div class="pl-4">
                            <h3 class="my-auto text-left text-dark">{{ $post->title }}</h3>
                            <p class="mb-0" style="font-size:15px;">Author: {{ $post->user->name }}</p>
                        </div>
                        <a class="ml-auto mr-4 close" type="button" role="button" href="" style="font-size:20px;">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->detail }}</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary float-right" role="button" href="">Request Position</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection