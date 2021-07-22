@extends('layouts/mentor-layout')

@section('content')

<div class="min-vh-100">
    <div class="container">
        <reactivecard-component :requests="{{json_encode($requests)}}" csrf="{{csrf_token()}}"/>
    </div>
</div>

@endsection