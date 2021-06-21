@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center" style="padding-top:150px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3" style="width:100%; background:#3aafa9; border-top-left-radius:10px; border-top-right-radius:10px;">
                    <div class="row p-0">
                        <h3 class="text-left text-white pl-3">Post Board</h3>
                        <form class="form-inline my-2 my-lg-0 mx-auto pr-3">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append"><button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></div>
                            </div>
                        </form>
                        <a class="btn btn-primary mr-3" href="{{ route('new-post') }}" role="button">New Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 p-5">
                        <div class="col mb-3">
                            <div class="card request-card">
                                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                    <div class="row pt-2 pb-0">
                                        <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                        <div class="pl-3">
                                            <h5 class="m-0 text-left">Card title</h5>
                                            <p class="m-0" style="font-size:14px;">Author: {{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae pharetra metus, eget fermentum felis. In tincidunt convallis suscipit. Vivamus hendrerit libero odio, vel pharetra nisi luctus id. Morbi vel erat tortor.</p>
                                </div>
                                <div class="card-footer pt-0" style="background:none; border:none;">
                                    <a class="btn btn-sm btn-primary pt-1 ml-auto float-right" href="{{ route('view-post') }}" role="button">Open</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="card request-card">
                                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                    <div class="row pt-2 pb-0">
                                        <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                        <div class="pl-3">
                                            <h5 class="m-0 text-left">Card title</h5>
                                            <p class="m-0" style="font-size:14px;">Author: {{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Mauris varius blandit est vitae molestie. Donec tincidunt ut ex sed gravida. Nullam scelerisque non nunc quis molestie. Nullam dapibus, felis vitae dapibus aliquam, felis metus faucibus nulla, sit amet sagittis nulla eros sed mauris. Nullam non lacus consequat, interdum nisl vel, accumsan quam. Cras fermentum tortor non cursus posuere. </p>
                                </div>
                                <div class="card-footer pt-0" style="background:none; border:none;">
                                    <a class="btn btn-sm btn-primary pt-1 ml-auto float-right" href="{{ route('view-post') }}" role="button">Open</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="card request-card">
                                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                    <div class="row pt-2 pb-0">
                                        <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                        <div class="pl-3">
                                            <h5 class="m-0 text-left">Card title</h5>
                                            <p class="m-0" style="font-size:14px;">Author: {{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-auto">
                                    <p class="card-text">Aenean placerat ex eget nisl semper pellentesque. Quisque fringilla commodo quam, non ultricies diam dapibus nec. Donec porttitor risus quis lorem bibendum facilisis. </p>
                                </div>
                                <div class="card-footer pt-0" style="background:none; border:none;">
                                    <a class="btn btn-sm btn-primary pt-1 ml-auto float-right" href="{{ route('view-post') }}" role="button">Open</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="card request-card">
                                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                    <div class="row pt-2 pb-0">
                                        <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                        <div class="pl-3">
                                            <h5 class="m-0 text-left">Card title</h5>
                                            <p class="m-0" style="font-size:14px;">Author: {{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Aliquam quis pretium purus, nec pellentesque turpis. Morbi fringilla quis velit dapibus fringilla. Phasellus laoreet orci nec massa cursus dictum. Suspendisse odio ipsum, tincidunt in consectetur non, condimentum ut lorem. Vivamus quis erat eleifend enim tincidunt mollis id at nisl.</p>
                                </div>
                                <div class="card-footer pt-0" style="background:none; border:none;">
                                    <a class="btn btn-sm btn-primary pt-1 ml-auto float-right" href="{{ route('view-post') }}" role="button">Open</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection