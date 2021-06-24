@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center" style="padding-top:150px;">
        <div class="col-12">
            <div class="card">
                <div class="row pt-4 pb-0 ml-4 mr-4">
                    <h3 class="text-left card-title text-dark pl-3 col-4" style="font-size:40px; font-weight:600;">My Groups</h3>
                    <form class="col-8 my-auto">
                    <div class="p-1 bg-light rounded rounded-pill shadow-sm border-1">
                        <div class="input-group">
                            <input type="search" placeholder="Search" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary text-white rounded rounded-pill">Search</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 g-4 p-5">
                        <div class="col mb-3">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header m-0 pb-0 pt-3 border-0">
                                    <div class="row pt-2 pb-0">
                                        <div class="pl-3">
                                            <h2 class="m-0 text-left text-dark card-title mb-1">Group Name</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-left ml-2 mb-3">
                                        <p class="text-muted card-subtitle mb-0" style="font-size:15px; font-weight:300;">Created on</p>
                                        <p class="badge card-subtitle text-white" style="background:#3aafa9; font-size:12px;">Module Tag</p>
                                    </div>
                                    <div class="ml-4">
                                        <div class="row pt-2 pb-2">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3 my-auto">
                                                <p class="mb-0" style="font-size:16px;">Member 1</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pb-2">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3 my-auto">
                                                <p class="mb-0" style="font-size:16px;">Member 2</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pb-2">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3 my-auto">
                                                <p class="mb-0" style="font-size:16px;">Member 3</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pb-2">
                                            <img class="my-auto ml-3" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:relative; border-radius:50%">
                                            <div class="pl-3 my-auto">
                                                <p class="mb-0" style="font-size:16px;">Member 4</p>
                                            </div>
                                        </div>
                                    </div>
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