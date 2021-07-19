@extends('layouts.layout')

@section('content')

<div class="min-vh-100">
    <mypost-component :posts="{{ json_encode($posts) }}" :user="{{ json_encode(Auth::user()) }}" :modules="{{ json_encode($posts->pluck('module')) }}">
        <template #post-btn>
            <a class="btn btn-teal" href="{{ route('post.create')}}" role="button">New Post</a>
        </template>
    </mypost-component>
</div>

@endsection