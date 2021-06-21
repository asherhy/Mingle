@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center" style="padding-top: 150px;">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="card shadow">
                <div class="card-header m-0 pb-0 pt-3 border-0" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <div class="row pt-2 pb-2">
                        <img class="my-auto ml-4" src="/images/avatars/{{ Auth::user()->avatar }}" style="width:60px; height:60px; position:relative; border-radius:50%">
                        <div class="pl-4">
                            <h3 class="my-auto text-left text-dark">Post Title</h3>
                            <p class="mb-0" style="font-size:15px;">Author: {{ Auth::user()->name }}</p>
                        </div>
                        <a class="ml-auto mr-4 close" type="button" role="button" href="{{ route('board') }}" style="font-size:20px;">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean auctor bibendum tortor, at maximus neque. Ut elit diam, vestibulum rhoncus semper eget, pretium nec metus. Ut quis accumsan nunc, in ullamcorper sem. Quisque porta faucibus elementum. Morbi id sapien vel arcu euismod lacinia. Donec non bibendum diam. Fusce aliquam ornare ex, sit amet auctor nunc condimentum pharetra. In vitae nunc molestie, ultrices turpis eget, pulvinar est. Aenean ut placerat augue. Nulla placerat, mi sit amet porttitor tincidunt, leo mauris varius nulla, ac viverra massa est commodo libero. Suspendisse consequat ut dolor in porttitor. Donec pulvinar euismod bibendum. Suspendisse mauris magna, blandit et diam eu, commodo lobortis est. Morbi quis nibh eu urna sagittis interdum. Aenean vel felis rhoncus, suscipit felis eget, congue est.<br><br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus turpis ac molestie pretium. Sed placerat eros quis neque maximus, ut vulputate magna laoreet. Pellentesque fringilla dolor vitae ex ultricies, in convallis risus tristique. Fusce lacinia auctor porta. Curabitur pellentesque non lorem in mollis. Pellentesque pellentesque pretium vehicula. Sed at dolor lectus. Nunc vestibulum nec dui consequat porta. Nam ac condimentum metus, sed fringilla diam. Nunc auctor magna vel semper cursus. Nulla et odio non dui blandit semper. Ut rutrum fermentum facilisis.<br><br>
                    Nulla laoreet eleifend tempus. Quisque sollicitudin mattis lacus. Suspendisse convallis, odio non posuere interdum, mauris risus vehicula orci, vitae vulputate urna felis eu elit. Nulla rutrum vestibulum tellus in sollicitudin. Duis libero purus, luctus eu tortor in, accumsan blandit sapien. Vivamus lobortis et magna vel laoreet. Maecenas eleifend imperdiet semper. Aliquam erat volutpat. In et lectus nisl. Praesent vitae sagittis metus, a malesuada libero. Duis rutrum, lectus nec luctus ullamcorper, mi mi aliquam est, eu vehicula felis nunc quis risus. Ut tristique justo eget arcu vehicula viverra. Donec pharetra augue quam, sit amet ornare purus molestie in.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary float-right" role="button" href="{{ route('new-request') }}">Request Position</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection