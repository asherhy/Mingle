@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
<div class="row row-top">
        <div class="col-12">
        @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card border-sharp shadow-sm">
                <div class="card-header bg-teal">
                    <h2 class="mb-0 pl-2 text-white">My Groups</h2>
                </div>
                <div class="card-body py-2">
                    <ul class="nav tabs" id="groupsTab" role="tablist">
                        @if( $postGroups->first() != null )
                            <li class="nav-item dropdown" role="presentation">
                                <a id="navbarDropdown" class="nav-link under px-0 mx-4" href="#" id="boardDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Board <i class="fas fa-caret-down pl-1"></i></a>
                                <div class="dropdown-menu" aria-labelledby="boardDropdown">
                                    @foreach($postGroups as $postGroup)
                                        <a class="dropdown-item nav-link" id="board-tab" data-toggle="tab"  href="{{ '#board'.$postGroup->id }}" role="tab" aria-controls="{{ $postGroup->title.'-tab' }}" aria-selected="false">{{ $postGroup->title }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a class="nav-link under px-0 mx-4" id="board-tab" data-toggle="tab" href="#board" role="tab" aria-controls="board" aria-selected="true">Board</a>
                            </li>
                        @endif
                        <li class="nav-item" role="presentation">
                            <a class="nav-link under px-0 mx-4" id="mentor-tab" data-toggle="tab" href="#mentor" role="tab" aria-controls="mentor-tab" aria-selected="false">Mentor</a>
                        </li>
                        @if( $moduleGroups->first() != null )
                            <li class="nav-item dropdown" role="presentation">
                                <a id="navbarDropdown" class="nav-link under px-0 mx-4" href="#" id="boardDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">QuickMatch Groups <i class="fas fa-caret-down pl-1"></i></a>
                                <div class="dropdown-menu" aria-labelledby="boardDropdown">
                                    @foreach($moduleGroups as $moduleGroup)
                                        <a class="dropdown-item nav-link" id="board-tab" data-toggle="tab"  href="{{ '#module'.$moduleGroup->id }}" role="tab" aria-controls="{{ $moduleGroup->modules.'-tab' }}" aria-selected="false">{{ $moduleGroup->modules }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a class="nav-link under px-0 mx-4" id="module-tab" data-toggle="tab" href="#module" role="tab" aria-controls="module-tab" aria-selected="false">QuickMatch Groups</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12">
            <div class="card card-body border-sharp shadow-sm sub-card bg-light">
                <div class="tab-content" id="groupsTabContent">
                    <div class="tab-pane fade show active" id="default" role="tabpanel">
                        <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ __('Select a tab to get started. ')}} &#128515;</h3>
                    </div>
                    @if( $postGroups->first() != null )
                        @foreach( $postGroups as $postGroup )
                            <div class="tab-pane fade" id="{{ 'board'.$postGroup->id }}" role="tabpanel">
                                <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ $postGroup->title }}</h3><hr class="m-2">
                                <div class="row col-12 p-3 justify-content-around align-items-center">
                                    @foreach($postGroup->users as $user)
                                        <div class="card border-sharp shadow-sm col-5 my-3">
                                            <div class="card-body d-inline-flex">
                                                <div class="col-auto">
                                                    <img src="{{ $user->avatar }}" style="width:60px; height:60px; border-radius:50%">
                                                </div>
                                                <div class="col my-auto">
                                                    <h5>{{ $user->name }}</h5>
                                                    <p class="text-muted mb-0">{{ "@".$user->telegram }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane fade" id="board" role="tabpanel">
                            <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ __('You currently have no groups formed from posts. Use the board function to find one!') }} &#128515;
                        </div>
                    @endif
                    @if( $mentorGroups->first() != null )
                        <div class="tab-pane fade" id="mentor" role="tabpanel">
                            <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ __('Mentors') }}</h3><hr class="m-2">
                            <div class="row col-12 p-3 justify-content-around align-items-center">
                                @foreach($mentorGroups as $m)
                                    <div class="card border-sharp shadow-sm col-5 my-3">
                                        <div class="card-body d-inline-flex">
                                            <div class="col-auto">
                                            <img src="{{ $m->mentor->avatar }}" style="width:60px; height:60px; border-radius:50%">
                                            </div>
                                            <div class="col my-auto">
                                                <h5>{{ $m->mentor->name }}</h5>
                                                <p class="text-muted mb-0">{{ "@".$m->mentor->telegram }}</p>
                                                <p class="text-muted mb-0">{{ $m->module->code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="tab-pane fade" id="mentor" role="tabpanel">
                        <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ __('You currently have no groups mentors, try requesting for one from the mentors page') }} &#128515;
                        </div>
                    @endif
                    @if( $moduleGroups->first() != null )
                        @foreach( $moduleGroups as $moduleGroup )
                            <div class="tab-pane fade" id="{{ 'module'.$moduleGroup->id }}" role="tabpanel">
                                <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ "Module Group for ".$moduleGroup->modules }}</h3><hr class="m-2">
                                <div class="row col-12 p-3 justify-content-around align-items-center">
                                    @foreach($moduleGroup->user_info as $email => $tele)
                                        <div class="card border-sharp shadow-sm col-5 my-3">
                                            <div class="card-body d-inline-flex">
                                                
                                                <div class="col my-auto">
                                                    <h5>{{ $email }}</h5>
                                                    <p class="text-muted mb-0">{{ "@".$tele }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane fade" id="module" role="tabpanel">
                            <h3 class="card-title px-3 py-2 text-dark text-left mb-0">{{ __('You currently have no module groups. Use the quick match function to find one!') }} &#128515;
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $( document ).ready(function() {
        $('.tabs').on('shown.bs.tab', 'a', function (e) {
            console.log(e);
            if (e.currentTarget) {
                $(e.currentTarget).removeClass('active');
            }
        });
    });
</script>

@endsection