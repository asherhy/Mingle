@extends('layouts.layout')

@section('content')


<div class="modal fade border-sharp" id="requestModal" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header bg-teal py-2">
                <h3 class="modal-title text-white">Request for Mentorship</h3>
                <button type="button" class="close btn-white" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body pt-4 request-modal">
                <form method="POST" action="{{ route('mentor.request.store', $user) }}">
                    @csrf
                    <div class="form-group form-row mb-4">
                        <label for="title" class="col-form-label col-md-2">Title</label>
                        <div class="col-md-10">
                            <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-row mb-4">
                        <label for="module" class="col-form-label col-md-2">Module</label>
                        <div class="col-md-10 my-auto">
                            <singleselect-component :fields="{{ json_encode($modules) }}" attri="{{ __('modules') }}"
                            pholder="{{ __('Select Your Module') }}"></singleselect-component>
                            @error('module')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row mb-4">
                        <label for="description" class="col-form-label col-md-2">Description</label>
                        <div class="col-md-10 my-auto">
                            <textarea type="description" name="detail" class="form-control @error('detail') is-invalid @enderror"
                                    id="description" style="height:100px;" value="{{ old('detail') }}" required>
                            </textarea>
                            @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <button class="btn btn-success ml-auto" type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container min-vh-100">
    <div class="row row-top align-items-center">
        <div class="profile-header border-sharp card col-12 shadow-sm">
            <div class="card-body col-12 d-inline-flex">
                <div class="col-auto pr-4">
                    <img class="profile-page-img" src="{{ asset('storage/avatars/'.$user->avatar)}}">
                </div>
                <div class="col my-auto pl-0">
                    <div>
                        <h2 class="mb-0 d-inline-block">{{ $user->name }}</h2>
                    </div>
                    <button type="button" class="btn btn-md btn-teal float-right" data-toggle="modal" data-target="#requestModal">
                        Request
                    </button>
                    <!-- Major -->
                    <p class="text-muted d-block mb-0">{{ __('Computer Science Undergraduate') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2 g-3">
        <div class="col-4">
            <div class="card border-sharp mr-3 p-0 shadow-sm">
                <h5 class="card-header profile-card-header text-left">Personal Information</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-envelope fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Email') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ $user->email }}</p>
                    </li>
                    <li class="list-group-item">
                        <i class="fab fa-telegram-plane fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Telegram Handle') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ "@".$user->telegram }}</p>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-venus-mars fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Gender') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ $user->gender == 'Female' ? "Female" : ($user->gender == 'Male' ? "Male" : "Others") }}</p>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-university fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Matriculation Year') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ $user->matric_year ?? "-" }}</p>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-graduation-cap fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Major') }}</p>
                        @if( $user->majors->first() != null )
                            @foreach($user->majors as $m)
                                <p class="text-dark mb-0 pb-0 pl-4">{{ $m->name }}</p>
                            @endforeach
                        @else
                            <p class="card-text text-muted">-</p>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card border-sharp p-0 mb-4 shadow-sm">
                <h5 class="card-header profile-card-header text-left">About</h5>
                <div class="card-body">
                    <!-- Mentor Self-Introduction -->
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mauris risus, faucibus sed porta sed, laoreet ut ipsum. Suspendisse elementum dolor ut purus lobortis cursus. Nulla facilisi. Vivamus et laoreet velit. Etiam a nulla tincidunt, tincidunt sem sed, fringilla dui. Aliquam tellus nunc, ultrices at luctus in, ultrices non ligula. Fusce sed nisl dapibus justo semper hendrerit. Curabitur eros ipsum, eleifend id justo sit amet, tempus aliquam orci.</p>
                </div>
            </div>
            <div class="card border-sharp p-0 mb-3 shadow-sm">
                <h5 class="card-header profile-card-header text-left">Modules Taken</h5>
                <div class="card-body">
                    @if( $user->modules->first() != null )
                        @foreach($user->modules as $m)
                            <p class="text-dark mb-0 pb-0 pl-4">{{ $m->code_title }}</p>
                        @endforeach
                    @else
                        <p class="card-text text-muted">-</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection