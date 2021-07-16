@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row row-top">
        <div class="col-12">
            <div class="card border-sharp shadow-sm">
                <div class="card-header bg-teal">
                    <h2 class="mb-0 pl-2 text-white">Posts</h2>
                </div>
                <div class="card-body py-2 d-flex flex-row">
                    <form>
                        <div class="p-2 bg-light rounded rounded-pill shadow-sm">
                            <div class="input-group">
                                <input type="search" placeholder="Search for a post" name="query" id="query" class="search-bar form-control border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="search-btn" type="submit" class="btn btn-link"><i class="fa fa-search text-teal"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-teal mr-3 my-auto ml-auto py-1" href="{{ route('post.create') }}" role="button">New Post</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12">
            <div class="card card-body border-sharp shadow-sm sub-card">
                @if( $posts->first() != null )
                    <div class="row row-cols-1 row-cols-lg-2 py-2">
                        @foreach( $posts as $post )
                            <div class="col">
                                <div class="card border-sharp shadow-sm my-3">
                                    <a class="stretched-link clickable-card" href="{{ route('post.show', $post) }}"></a>
                                    <div class="card-header d-inline-flex px-0 post-card-header">
                                        <div class="col-auto">
                                            <img src="/images/avatars/{{ $post->user->avatar }}" style="width:50px; height:50px; border-radius:50%;">
                                        </div>
                                        <div class="col-auto my-auto post-card-title">
                                            <h5 class="mb-0 post-title pl-0 text-dark">{{ $post->title }}</h5>
                                            <p class="text-muted mb-0">{{ "Posted by: ".$post->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="card-body post-card-body pb-1">
                                    <p class="badge text-white text-left mb-2" style="background:#3aafa9; font-size:12px;">{{ $post->module->code }}</p>
                                        <p class="card-text">{{ $post->detail }}</p>
                                    </div>
                                    <div class="card-footer border-0">
                                        @if ($post->created_at == $post->updated_at)
                                            <p class="text-muted card-subtitle text-left">Posted on {{ $post->created_at }}</p>
                                        @else
                                            <p class="text-muted card-subtitle text-left">Edited on {{ $post->updated_at }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                @endif
                <div class="card-footer">
                    <div class="float-right">
                        {{ $posts->links('pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection