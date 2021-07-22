@extends('layouts/layout')

@section('content')

<?php
    $mentormodules = [];    
?>

<div class="container min-vh-100">
    <findmentor-component :modules="{{ json_encode($modules) }}" :mentors="{{ json_encode($mentors) }}" :mentormodules="{{ json_encode($mentormodules) }}">

    </findmentor-component>
</div>

@endsection