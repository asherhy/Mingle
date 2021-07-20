@extends('layouts/mentor-layout')

@section('content')

<!-- Example Data -->
<?php
    class ExampleRequest {
        public function __construct($module, $id, $title, $description, $author) {
            $this->module = $module;
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->author = $author;
        }
    }
    $example = new ExampleRequest("CS2040S", "a", "Example Title", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed diam turpis. Mauris sed massa maximus, semper arcu sed, porttitor elit. Fusce a malesuada tellus. Ut posuere arcu quam, nec facilisis quam tempor commodo. Nam elit eros, cursus non risus nec, volutpat euismod orci. Praesent ultrices lobortis dui, quis scelerisque tortor laoreet non. Donec gravida nisl sit amet libero facilisis tristique. Donec a ex eu orci sodales ullamcorper. Nunc nec ullamcorper diam. Nullam ut elit ante.", "User 1");
    $example2 = new ExampleRequest("MA1101R", "b", "Example Title 2", "Aenean porttitor vel massa elementum porta. Morbi ornare dolor nisl, tristique pharetra arcu mollis vitae. Donec eu felis sit amet augue cursus cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean dignissim turpis ut velit rutrum, vitae volutpat nulla dictum. Sed congue massa vel faucibus efficitur. ", "User 2");
    $example3 = new ExampleRequest("CS1101S","c", "Example Title 3", "In semper ligula ac augue finibus, luctus ullamcorper ligula sagittis. Curabitur eu urna nibh. Integer sapien elit, dictum nec tellus sit amet, blandit faucibus elit. Pellentesque eu erat rhoncus, pharetra arcu sed, semper enim. Aliquam consectetur massa tortor, sed maximus magna tincidunt ac.", "User 3");
    $example4 = new ExampleRequest("GER1000", "d", "Example Title 4", "Curabitur non nulla ut mi lacinia iaculis porta vitae purus. Nam luctus eu libero ut gravida. In at tortor sit amet quam sollicitudin sagittis sit amet vel leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce aliquam lacus nec tellus ullamcorper vestibulum.", "User 4");
    $examples = [];
    array_push($examples, $example, $example2, $example3, $example4);
?>

<div class="min-vh-100">
    <div class="container">
        <reactivecard-component :requests="{{json_encode($examples)}}"/>
    </div>
</div>

@endsection