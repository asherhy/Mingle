@extends('layouts.layout')

@section('content')

<?php

    $mentors = [];
  
    $mentor_modules = [];

?>

<div class="min-vh-100">
    <mentorrequest-component :requests="{{ json_encode($mentor_requests) }}" :mentors="{{ json_encode($mentors) }}"
        :modules="{{ json_encode($mentor_modules) }}">
    </mentorrequest-component>
</div>

@endsection