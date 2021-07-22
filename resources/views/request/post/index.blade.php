@extends('layouts.layout')

@section('content')

<div class="min-vh-100">
    <?php
        $posts = $postRequests->pluck('post');
    ?>
    <myrequest-component :requests="{{ json_encode($postRequests) }}" :posts="{{ json_encode($posts) }}"
        :modules="{{ json_encode($posts->pluck('module')) }}" :postowners="{{ json_encode($posts->pluck('user')) }}">
    </myrequest-component>
</div>

@endsection