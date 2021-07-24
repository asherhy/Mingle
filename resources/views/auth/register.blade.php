@extends('layouts.layout')

@section('content')
<?php 
    $empty_a = json_encode(array());
    
    $form_action = route('register');
?>

<registration-component 
    form_action="{{ $form_action }}" 
    csrf="{{ csrf_token() }}" 
    :emails="{{ json_encode($emails)}}" 
    :majors="{{ json_encode($majors->pluck('name')->all()) }}"
    :modules="{{ json_encode($modules->pluck('code_title')->all()) }}" 
/>
@endsection
