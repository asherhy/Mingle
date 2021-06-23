@extends('layouts.layout')

@section('content')

<div class="modal fade" id="createRequestModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content" style="border-radius:15px;">
            <div class="modal-header" style="background-color: #3aafa9; border-top-left-radius:15px; border-top-right-radius:15px">
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content" style="border-radius:15px;">
            <div class="modal-header" style="background-color: #3aafa9; border-top-left-radius:15px; border-top-right-radius:15px">
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
    <div class="row d-flex justify-content-center" style="padding-top: 150px;">
        <div class="col-12 col-sm-10 col-lg-8">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endif
            <div class="card shadow">
                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <div class="row pt-2 pb-2">
                        <img class="my-auto ml-4" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:60px; height:60px; position:relative; border-radius:50%">
                        <div class="pl-4 my-auto">
                            <div class="row pl-3 p-0">
                                <p class="mb-0 mr-auto" style="font-size:20px;">Author: {{ $post->user->name }}</p>
                            </div>
                            <p class="text-muted mb-0" style="font-size:12px; font-weight:300px;">Posted on {{ $post->created_at }}</p>
                        </div>
                        @if ($post->status == 'Active')
                            <p class="badge badge-success ml-auto mb-auto mr-4">Active</p>
                        @else
                            <p class="badge badge-danger ml-auto mb-auto mr-4">Closed</p>
                        @endif
                        <a class="ml-0 mr-4 close" type="button" role="button" href="" style="font-size:20px;">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <h2 class="text-left text-dark card-title" style="font-weight:500;">{{ $post->title }}</h2>
                        <p class="card-text" style="font-size:18px;">{{ "type :".$post->type }}</p>
                        <p class="card-text" style="font-size:18px;">{{ $post->detail }}</p>
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
                            <a class="btn btn-primary float-right mr-2" role="button" data-toggle="modal" data-target="#editPostModal">Edit</a>
                        </form>
                    @elseif($post->status == "Active")
                        <a class="btn btn-primary float-right" role="button" data-toggle="modal" data-target="#createRequestModal">Request Position</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection