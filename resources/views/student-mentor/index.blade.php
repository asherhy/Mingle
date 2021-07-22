@extends('layouts/layout')

@section('content')

<?php
    class Mentor {
        public function __construct($id, $name, $status, $modules, $avatar, $title) {
            $this->id = $id;
            $this->name = $name;
            $this->status = $status;
            $this->modules = $modules;
            $this->avatar = $avatar;
            $this->title = $title;
        }
    }

    $moduleSet1 = $modules->take(5);
    $moduleSet2 = [$modules[5], $modules[6], $modules[7], $modules[8], $modules[9]];
    $moduleSet3 = [$modules[10], $modules[11], $modules[12], $modules[13], $modules[14]];

    $mentormodules = [];
    array_push($mentormodules, $moduleSet1, $moduleSet2, $moduleSet3);

    $m1 = new Mentor(1, 'mentor1', 'active', $moduleSet1, 'default-dp.png', 'Some Title');
    $m2 = new Mentor(2, 'mentor2', 'active', $moduleSet2, 'default-dp.png', 'Some Other Title');
    $m3 = new Mentor(3, 'mentor3', 'inactive', $moduleSet3, 'default-dp.png', 'Inactive Mentor');

    $mentors = [];
    array_push($mentors, $m1, $m2, $m3);
?>

<div class="container min-vh-100">
    <findmentor-component :modules="{{ json_encode($modules) }}" :mentors="{{ json_encode($mentors) }}" :mentormodules="{{ json_encode($mentormodules) }}">

    </findmentor-component>
</div>

@endsection