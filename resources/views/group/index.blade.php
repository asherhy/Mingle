@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center" style="padding-top:150px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3" style="width:100%; background:#3aafa9; border-top-left-radius:15px; border-top-right-radius:15px;">
                    <div class="row p-0">
                        <h3 class="text-left text-white pl-3">Groups</h3>
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
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-tab active" id="pills-board-tab" data-toggle="pill" href="#pills-board" role="tab" aria-controls="pills-board" aria-selected="true">Board</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-tab" id="pills-mentor-tab" data-toggle="pill" href="#pills-mentor" role="tab" aria-controls="pills-mentor" aria-selected="false">Mentor</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-tab" id="pills-module-tab" data-toggle="pill" href="#pills-module" role="tab" aria-controls="pills-module" aria-selected="false">Module Group</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-tab" id="pills-study-tab" data-toggle="pill" href="#pills-study" role="tab" aria-controls="pills-study" aria-selected="false">Study Buddy</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-board" role="tabpanel" aria-labelledby="pills-board-tab">
                            @foreach($postGroups as $postGroup)
                                <div class="card request-card">
                                    <div style="transform: rotate(0);">
                                        <div class="card-header m-0 pb-0 pt-3 border-0">
                                        </div>
                                        <div class="card-body pt-2">
                                                <div>{{ $postGroup->post->title  }}</div>
                                            @foreach($postGroup->users as $user)
                                                <p class="badge text-white text-left mb-1" style="background:#3aafa9; font-size:12px;">{{ $user->name }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer pt-2" style="background:none; border:none;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="pills-mentor" role="tabpanel" aria-labelledby="pills-mentor-tab">
                            -
                        </div>
                        <div class="tab-pane fade" id="pills-module" role="tabpanel" aria-labelledby="pills-module-tab">

                        </div>
                        <div class="tab-pane fade" id="pills-study" role="tabpanel" aria-labelledby="pills-study-tab">
                            -
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection