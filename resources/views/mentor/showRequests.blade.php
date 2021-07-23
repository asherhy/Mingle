@extends('layouts.layout')

@section('content')

<div class="min-vh-100">
    <mentorrequest-component :requests="{{ json_encode($mentor_requests) }}">
    </mentorrequest-component>
</div>

@endsection