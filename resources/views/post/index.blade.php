@extends('layouts.layout')

@section('content')

<div class="min-vh-100">
    <allpost-component :posts="{{ json_encode($posts) }}" :users="{{ json_encode($posts->pluck('user')) }}" :modules="{{ json_encode($posts->pluck('module')) }}">
        <template #post-btn>
            <a class="btn btn-teal mr-3 my-auto ml-auto py-1" href="{{ route('post.create')}}" role="button">New Post</a>
        </template>
    </allpost-component>
</div>

@endsection