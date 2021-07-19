@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <?php
        $posts = $postRequests->pluck('post');
    ?>
    <myrequest-component :requests="{{ json_encode($postRequests) }}" :posts="{{ json_encode($posts) }}"
        :modules="{{ json_encode($posts->pluck('module')) }}" :postowners="{{ json_encode($posts->pluck('user')) }}">
    </myrequest-component>
    <div class="row d-flex justify-content-center" style="padding-top:150px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3" style="width:100%; background:#3aafa9;">
                    <div class="row p-0">
                        <h3 class="text-left text-white pl-3">My Requests</h3>
                        <form class="form-inline my-2 my-lg-0 ml-auto pr-3">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append"><button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 p-5">
                        @foreach($postRequests as $postRequest)
                            <div class="col mb-3">
                                <div class="card request-card">
                                    <div class="card-header m-0 pb-0 pt-3 border-0">
                                        <div class="row pt-2 pb-0">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3">
                                                <h5 class="m-0 text-left text-dark">{{ $postRequest->post->title }}</h5>
                                                <p class="m-0" style="font-size:14px;">Author:{{ $postRequest->post->user->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted card-subtitle text-left mb-2">Requested on {{ $postRequest->created_at }}</p>
                                        @switch($postRequest->status)
                                            @case("Accepted")
                                            <p class="badge badge-success ml-auto mb-auto mr-4">Accepted</p>
                                                @break

                                            @case("Rejected")
                                                <p class="badge badge-danger ml-auto mb-auto mr-4">Rejected</p>
                                                @break

                                            @case("Pending")
                                                <p class="badge badge-primary ml-auto mb-auto mr-4">Pending</p>
                                                @break
                                            @case("Deleted")
                                                <p class="badge badge-warning ml-auto mb-auto mr-4">Deleted</p>
                                                @break
                                        @endswitch
                                   </div>
                                    <div class="card-footer pt-0" style="background:none; border:none;">
                                        <button class="btn btn-sm btn-danger float-right ml-2" type="submit">Delete</button>
                                        <a class="btn btn-sm btn-primary pt-1 ml-auto float-right" href="#" role="button">Edit</a>
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