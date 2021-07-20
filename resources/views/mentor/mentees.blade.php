@extends('layouts/mentor-layout')

@section('content')

<div class="container min-vh-100">
    <div class="row row-top">
        <div class="col-12">
            <div class="card border-sharp shadow-sm">
                <div class="card-header bg-teal">
                    <h2 class="mb-0 pl-2 text-white">My Mentees</h2>
                </div>
                <div class="card-body py-2">
                    <ul class="nav" id="menteesTab" role="tablist">
                        @if( Auth::user()->modules->first() != null )
                            @foreach(Auth::user()->modules as $m)
                            <li class="nav-item">
                                <a class="{{ $loop->first ? 'active' : '' }} nav-link under px-0 mx-4" id="{{ $m->code }}-tab" data-toggle="tab" href="{{ '#'.$m->code }}" role="tab">{{ $m->code }}</a>
                            </li>
                            @endforeach
                        @else
                            <div></div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12">
            <div class="card card-body border-sharp shadow-sm sub-card">
                <div class="tab-content" id="menteesTabContent">
                    @if( Auth::user()->modules->first() != null )
                        @foreach(Auth::user()->modules as $m)
                        <div class="tab-pane fade card-text {{ $loop->first ? 'show active' : ''}}" id="{{ $m->code }}" role="tabpanel">
                            <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ $m->code }} Mentees</h3><hr class="m-2">
                            <div class="row col-12 p-3 justify-content-around align-items-center">
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col-auto my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col-auto my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col-auto my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col-auto my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-sharp shadow-sm col-5 my-3">
                                    <div class="card-body d-inline-flex">
                                        <div class="col-auto">
                                            <img src="/images/avatars/default-dp.png" style="width:60px; height:60px; border-radius:50%">
                                        </div>
                                        <div class="col-auto my-auto">
                                            <h5>Mentee Username</h5>
                                            <p class="text-muted mb-0">telegram-handle</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div>You Have No Mentees &#128515;</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection