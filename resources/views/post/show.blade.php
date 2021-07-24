@extends('layouts.layout')

@section('content')

<div class="modal fade" id="createRequestModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="content">
        <div class="modal-content border-sharp">
            <div class="modal-header bg-teal py-2">
                <h3 class="modal-title text-white">Create new request</h3>
                <button type="button ml-auto" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('request.post.store', $post) }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="description" class="col-form-label"><h5>Why are you applying for this role?</h5></label>
                            <div class="my-auto">
                                <textarea type="description" class="form-control" name="detail" id="description" style="height:150px;" placeholder="Start typing here..."></textarea>
                            </div>
                        </div>
                        <div class="form-group form-check ml-1">
                            <div class="form-row">
                                <input class="form-check-input" type="checkbox" name="showInfo" id="showInfo">
                                <label class="form-check-label" for="show-info">
                                    Allow Mingle to show your information to the owner of the post?
                                </label>
                            </div>
                            <a class="text-muted" href="#"><small>See what information will be shared</small></a>
                        </div>
                        <div class="form-group form-row">
                            <button class="btn btn-success ml-auto" type="submit">Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPostModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="content">
        <div class="modal-content border-sharp">
            <div class="modal-header bg-teal py-2">
                <h3 class="modal-title text-white">Edit Post</h3>
                <button type="button ml-auto" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('post.update', $post)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-row mb-4">
                            <label for="title" class="col-form-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}" required>
                            </div>
                        </div>
                        <div class="form-group form-row mb-4">
                            <label for="type" class="col-form-label col-md-2">Type</label>
                            <div class="col-md-10">
                                <input type="type" name="type" class="form-control @error('type') is-invalid @enderror" id="type" value="{{ $post->type }}" required>
                            </div>
                        </div>
                        <div class="form-group form-row mb-4">
                            <label for="module" class="col-form-label col-md-2">Module</label>
                            <div class="col-md-10 my-auto">
                                <singleselect-component :fields="{{ json_encode($modules) }}" attri="{{ __('modules') }}" preselects="{{ $post->module->code_title }}"
                                pholder="{{ __('Select Your Module') }}"></singleselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row mb-4">
                            <label for="module" class="col-form-label col-md-2">Status</label>
                            <div class="col-md-10 my-auto">
                                <singleselect-component :fields="{{ json_encode($types) }}" attri="{{ __('status') }}" preselects="{{ $post->status }}"
                                pholder="{{ __('Change Status') }}"></singleselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row mb-4">
                            <label for="description" class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10 my-auto">
                                <textarea type="description" name="detail" class="form-control @error('detail') is-invalid @enderror"
                                        id="description" style="height:100px;" required>
                                        {{ $post->detail }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <button class="btn btn-success ml-auto" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container min-vh-100">
    <div class="row d-flex justify-content-center post-row">
        <div class="col-12 col-md-10 col-lg-8">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                            <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endifP
            <div class="card shadow-sm border-sharp">
                <div class="card-header m-0 pt-2 pb-2" style="background:#fefff;">
                    <div class="row pt-2 pb-2">
                        <img class="my-auto ml-4" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:60px; height:60px; position:relative; border-radius:50%">
                        <div class="pl-4 my-auto">
                            <div class="row pl-3 p-0">
                                <h3 class="mb-0 mr-auto">Author: {{ $post->user->name }}</h3>
                            </div>
                            @if ($post->created_at == $post->updated_at)
                                <p class="text-muted mb-0">Posted on {{ $post->created_at }}</p>
                            @else
                                <p class="text-muted mb-0" style="font-size:12px; font-weight:500;">Edited on {{ $post->updated_at }}</p>
                            @endif
                        </div>
                        @if ($post->status == 'Active')
                            <h3 class="ml-auto mb-auto mr-4"><span class="badge badge-lg badge-success p-2">Active</span></h3>
                        @else
                            <h3 class="ml-auto mb-auto mr-4"><span class="badge badge-lg badge-danger p-2">Closed</span></h3>
                        @endif
                        <!-- <a class="ml-0 mr-4 close" type="button" role="button" href="" style="font-size:20px;">
                            &times;
                        </a> -->
                    </div>
                    <h5 class="card-subtitle text-muted pl-3 pt-3">{{ "Type: ".$post->type }}</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="container">
                        <h2 class="text-left card-title mb-2 mt-3" style="font-weight:bold; color:#17252a;">{{ $post->title }}</h2>
                        <h5 class="badge text-white mb-3 bg-teal" style="font-size: 90%;">{{ $modules[$post->module_id - 1] }}</h5>
                        <p class="card-text" style="font-size:18px;">{{ $post->detail }}</p>
                            @if (count($postRequests) > 0)
                                @if ($post->user_id == Auth::user()->id)
                                    @foreach ($postRequests as $postRequest)
                                        <hr class="mt-1 mb-3"/>
                                        <div class="col-12">
                                            <div class="row pt-1 pb-1">
                                                <div class="col-1 d-flex justify-content-center pr-0">
                                                    <img class="mx-auto" src="/images/avatars/{{ $postRequest->user->avatar }}" style="width:50px; height:50px; position:relative; border-radius:50%">
                                                </div>
                                                <div class="col-10 pl-0 my-auto p-2 pl-3 pr-3 ml-4" style="width:100%; background:#def2f1; height:auto; border-radius: 20px;">
                                                        <p class="pb-0 mb-0 text-left" style="font-size:12px; font-weight:bold;">{{ $postRequest->user->name}}</p>
                                                        @switch($postRequest->status)
                                                            @case("Accepted")
                                                            <p class="badge badge-success ml-auto mb-auto mr-4">Accepted</p>
                                                                @break

                                                            @case("Rejected")
                                                                <p class="badge badge-danger ml-auto mb-auto mr-4">Rejected</p>
                                                                @break

                                                            @case("Pending")
                                                                <p class="badge badge-teal ml-auto mb-auto mr-4">Pending</p>
                                                                @break
                                                            @case("Deleted")
                                                                <p class="badge badge-warning ml-auto mb-auto mr-4">Deleted</p>
                                                                @break
                                                        @endswitch
                                                        <p class="mb-1 text-left" style="font-size:15px; font-weight:400;">{{ $postRequest->detail }}</p>
                                                        <p class="text-left text-muted mb-0 pt-1" style="font-size:12px; font-weight:400;">{{ "Request made on " .$postRequest->created_at }}
                                                </div>
                                            </div>
                                            @if($postRequest->status == "Pending")
                                                <div class="row p-2">
                                                    <div class="ml-auto mr-4 d-inline-flex">
                                                        <form method="POST" action="{{ route('request.post.update', $postRequest) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-sm btn-success mr-1" type="submit">Accept</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('request.post.update', $postRequest) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn btn-sm btn-danger mr-1" type="submit">Reject</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                    </div>
                </div>
                <div class="card-footer">
                    <!-- if post doesn't belong to user show request position button -->
                    <!-- if post belongs to user show delete and edit button -->
                    @if ($post->user_id == Auth::user()->id)
                        <form method="POST" action="{{ route('post.delete', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-type="deletePost" class="btn btn-danger submit-btn">
                                                {{ __('Delete') }}
                            </button>
                            <a class="btn btn-teal float-right mr-2" role="button" data-toggle="modal" data-target="#editPostModal">Edit</a>
                        </form>
                    @elseif($post->status == "Active")
                        <a class="btn btn-teal float-right" role="button" data-toggle="modal" data-target="#createRequestModal">Request Position</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection