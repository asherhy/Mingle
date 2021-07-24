@extends( Auth::user()->allRoles()->contains('student') ? 'layouts.layout' :'layouts.mentor-layout')

@section('content')


<div class="modal fade border-sharp" id="editProfileModal" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header bg-teal py-2">
                <h3 class="modal-title text-white">Edit Profile</h3>
                <button type="button" class="close btn-white" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body pt-4 profile-edit-modal">
                <form enctype="multipart/form-data" action="{{ route('updateProfile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                    <div class="form-group form-row">
                            <label for="name" class="col-form-label col-md-4">Name</label>
                            <div class="col-md-8">
                                <input type="name" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="email" class="col-form-label col-md-4">Email</label>
                            <div class="col-md-8"><input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled></div>
                        </div>
                        <div class="form-group form-row">
                            <label for="telegram" class="col-form-label col-md-4">Telegram</label>
                            <div class="input-group col-md-8">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="telegram" class="form-control" name='telegram' id="telegram" value="{{ Auth::user()->telegram }}" required>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="major" class="col-form-label col-md-4">Major</label>
                            <div class="col-md-8 my-auto">
                                <multiselect-component :fields="{{ json_encode($majors->pluck('name')->all()) }}" attri="{{ __('majors[]') }}" :preselects="{{ json_encode(Auth::user()->majors->pluck('name')->all()) }}"
                                 pholder="{{ __('Select Your Major(s)') }}"></multiselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="matric-year" class="col-form-label col-md-4">Matric Year</label>
                            <div class="col-md-8 my-auto">
                                <?php $years = ['2018', '2019', '2020', '2021', '2022']; ?>
                                <singleselect-component :fields='{{ json_encode($years) }}' attri="{{ __('matric') }}" preselects="{{ Auth::user()->matric_year }}"
                                pholder="{{ __('Choose Your Matric Year') }}"></singleselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="gender" class="col-form-label col-md-4">Gender</label>
                            <div class="col-md-8 my-auto">
                                <?php $genders = ['Female', 'Male', 'Other']; ?>
                                <singleselect-component :fields='{{ json_encode($genders) }}' attri="{{ __('gender') }}" preselects="{{ Auth::user()->gender == 'Female' ? 'Female' : (Auth::user()->gender == 'Male' ? 'Male' : 'Other') }}"
                                pholder="{{ __('Choose Your Gender') }}"></singleselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="modules" class="col-form-label col-md-4">Modules</label>
                            <div class="col-md-8 my-auto">
                                <multiselect-component :fields="{{ json_encode($modules->pluck('code_title')->all()) }}" attri="{{ __('modules[]') }}" :preselects="{{json_encode(Auth::user()->modules->pluck('code_title')->all())}}"
                                 pholder="{{ __('Select Your Modules') }}"></multiselect-component>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="intro" class="col-form-label col-md-4">Introduce Yourself</label>
                            <div class="col-md-8 my-auto">
                                <textarea class="form-control" rows="3" name="intro" id="intro">{{ Auth::user()->detail }}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <button class="btn btn-success ml-auto" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade border-sharp" id="editProfilePhoto" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header bg-teal py-2">
                <h3 class="modal-title text-white">Update Photo</h3>
                <button type="button" class="close btn-white" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body pt-4 profile-edit-modal">
                <form enctype="multipart/form-data" action="{{ route('user.changePhoto') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="form-group form-row">
                            <label for="profile-img" class="col-form-label col-md-4">Update Profile Image</label>
                            <div class="col-md-8">
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <button class="btn btn-success ml-auto" type="submit">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container min-vh-100">
    <div class="row row-top align-items-center">
        <div class="profile-header border-sharp card col-12 shadow-sm px-0">
            <div class="card-body col-12 d-inline-flex bg-light px-5">
                <div class="col-auto pr-4">
                    <img class="profile-page-img darken-img-hover" data-toggle="modal" data-target="#editProfilePhoto" src="{{ asset('storage/avatars/'.Auth::user()->avatar)}}" 
                        data-toggle="tooltip" data-placement="top" title="Click to change profile picture">
                </div>
                <div class="col my-auto pl-0">
                    <div>
                        <h2 class="mb-0 d-inline-block">{{ Auth::user()->name }}</h2>
                    </div>
                    <button type="button" class="btn btn-sm btn-teal float-right" data-toggle="modal" data-target="#editProfileModal">
                        Edit Profile
                    </button>
                    <!-- Major -->
                    @if( Auth::user()->majors->first() != null )
                        @foreach(Auth::user()->majors as $m)
                            <p class="text-muted d-block mb-0">{{ $m->name }}</p>
                        @endforeach
                    @else
                        <p class="text-muted d-block mb-0">-</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2 g-3">
        <div class="col-4">
            <div class="card border-sharp mr-3 p-0 shadow-sm">
                <h5 class="card-header profile-card-header text-left">Personal Information</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">
                        <i class="fas fa-envelope fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Email') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ Auth::user()->email }}</p>
                    </li>
                    <li class="list-group-item bg-light">
                        <i class="fab fa-telegram-plane fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Telegram Handle') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ "@".Auth::user()->telegram }}</p>
                    </li>
                    <li class="list-group-item bg-light">
                        <i class="fas fa-venus-mars fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Gender') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ Auth::user()->gender == 'Female' ? "Female" : (Auth::user()->gender == 'Male' ? "Male" : "Others") }}</p>
                    </li>
                    <li class="list-group-item bg-light">
                        <i class="fas fa-university fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Matriculation Year') }}</p>
                        <p class="text-dark mb-0 pb-0 pl-4">{{ Auth::user()->matric_year ?? "-" }}</p>
                    </li>
                    <li class="list-group-item bg-light">
                        <i class="fas fa-graduation-cap fa-lg text-muted d-inline"></i>
                        <p class="text-muted mb-0 pb-1 pl-1 d-inline">{{ __('Major') }}</p>
                        @if( Auth::user()->majors->first() != null )
                            @foreach(Auth::user()->majors as $m)
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
                <div class="card-body bg-light">
                    <!-- Mentor Self-Introduction -->
                    @if( Auth::user()->detail != null)
                        <p>{{ Auth::user()->detail }}</p>
                    @else
                        <p>The user hasn't written anything here!</p>
                    @endif
                </div>
            </div>
            <div class="card border-sharp p-0 mb-3 shadow-sm">
                <h5 class="card-header profile-card-header text-left">Modules Taken</h5>
                <div class="card-body bg-light">
                    @if( Auth::user()->modules->first() != null )
                        @foreach(Auth::user()->modules as $m)
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