@extends('layouts.layout')

@section('content')

<?php
    class MentorRequest {
        public function __construct($id, $mentor_id, $title, $detail, $module_id, $status, $created_at) {
            $this->id = $id;
            $this->mentor_id = $mentor_id;
            $this->title = $title;
            $this->detail = $detail;
            $this->module_id = $module_id;
            $this->status = $status;
            $this->created_at = $created_at;
        }
    }

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

    $mp1 = new MentorRequest(1, 1, 'Help Plz', 'Donec accumsan nulla eu ipsum ultricies, id imperdiet erat tincidunt. Nullam rutrum ultricies hendrerit. Integer non lectus mauris. Aliquam eu dolor maximus, scelerisque metus et, ultricies libero. Proin vestibulum leo non dictum hendrerit. Mauris mollis nulla eros, non pretium diam gravida ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed porta tincidunt turpis, vitae condimentum risus scelerisque vitae. Integer posuere fermentum purus, ut faucibus sem pretium sit amet. In non eros in eros vehicula mattis. Nulla gravida congue velit eu sodales.', '2', 'Pending', "2021-07-22T13:17:34.195Z");
    $mp2 = new MentorRequest(2, 2, 'I Need Help', 'Etiam porta dictum risus nec sollicitudin. Nulla facilisi. Nunc eget massa ac ante egestas consectetur. Morbi a nisl in neque fringilla finibus et in risus. Integer vel turpis porttitor, ornare ex non, dignissim eros. Sed et arcu eu erat mattis vestibulum. Morbi eleifend, nunc ut vulputate tincidunt, felis leo vestibulum massa, et vestibulum turpis massa sit amet nulla. Phasellus condimentum leo eu turpis elementum, id finibus sem accumsan. Mauris erat neque, pellentesque sit amet tincidunt in, tincidunt non leo. Donec gravida lacinia elementum. Donec ultricies porta suscipit. Duis mattis commodo pretium. Aenean semper, eros quis auctor dictum, lacus leo tempor urna, quis eleifend enim ligula sed felis. Aliquam dapibus justo eu arcu sollicitudin, eu dictum odio aliquet.', '7', 'Accepted', "2021-07-22T13:17:34.195Z");
    $mp3 = new MentorRequest(3, 3, 'Please Mentor Me', 'Nullam sed euismod tellus.', '11', 'Rejected', "2021-07-22T13:17:34.195Z");

    $mentor_requests = [];
    array_push($mentor_requests, $mp1, $mp2, $mp3);

    $mentor_modules = [];
    array_push($mentor_modules, $modules[1], $modules[6], $modules[10]);

?>

<div class="min-vh-100">
    <mentorrequest-component :requests="{{ json_encode($mentor_requests) }}" :mentors="{{ json_encode($mentors) }}"
        :modules="{{ json_encode($mentor_modules) }}">
    </mentorrequest-component>
</div>

@endsection