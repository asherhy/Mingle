@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center" style="padding-top:150px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3" style="width:100%; background:#3aafa9; border-top-left-radius:15px; border-top-right-radius:15px;">
                    <div class="row p-0">
                        <h3 class="text-left text-white pl-3">Post Board</h3>
                        <form class="form-inline my-2 my-lg-0 mx-auto pr-3">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append"><button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></div>
                            </div>
                        </form>
                        <a class="btn btn-primary mr-3" href="{{ route('post.create') }}" role="button">New Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 p-5">
                        @foreach( $posts as $post )
                            <div class="col mb-3">
                                <div class="card request-card">
                                    <div class="card-header m-0 pb-0 pt-3 border-0">
                                        <div class="row pt-2 pb-0">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3">
                                                <a class="stretched-link clickable-card" href="{{route('post.show', $post)}}">
                                                    <h5 class="m-0 text-left text-dark">{{ $post->title }}</h5>
                                                </a>
                                                <p class="m-0" style="font-size:14px;">Author: {{ $post->user->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted card-subtitle text-left mb-2">Posted on {{ $post->created_at }}</p>
                                        <p class="card-text">{{ $post->detail }}</p>
                                    </div>
                                    <div class="card-footer pt-0" style="background:none; border:none;">
                                        <!-- <a class="btn btn-sm btn-primary pt-1 ml-auto float-right stretched-link" href="{{route('post.show', $post)}}" role="button">Open</a> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection