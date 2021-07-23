@extends('layouts.layout')

@section('content')
<?php $empty_a = json_encode(array()) ?>
<div class="container min-vh-100">
    <div class="row d-flex justify-content-center signup-row">
        <div class="col-10 col-md-7 col-lg-5">
            <div class="card signup border-sharp px-0 shadow-sm" id="signup-form">
                <div class="card-header signup-card-header">
                    <h3 class="text-left card-title mb-1 font-weight-bold">Create your mingle account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="signup" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-left">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your NUS email"  name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="telegram" class="col-form-label text-md-right">Telegram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="telegram" class="form-control" name='telegram' id="telegram" required>
                                @error('telegram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="major" class="col-form-label text-md-right">Major</label>
                            <div class=" my-auto">
                                <multiselect-component :fields="{{ json_encode($majors->pluck('name')->all()) }}" attri="{{ __('majors[]') }}" :preselects="{{$empty_a}}"
                                 pholder="{{ __('Select Your Major(s)') }}"></multiselect-component>
                                 @error('majors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="matric-year" class="col-form-label text-md-right">Matric Year</label>
                            <div class="my-auto">
                                <?php $years = ['2018', '2019', '2020', '2021', '2022']; ?>
                                <singleselect-component :fields='{{ json_encode($years) }}' attri="{{ __('matric') }}" preselects=""
                                pholder="{{ __('Choose Your Matric Year') }}"></singleselect-component>
                                @error('matric')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label text-md-right">Gender</label>
                            <div class="my-auto">
                                <?php $genders = ['Female', 'Male', 'Other']; ?>
                                <singleselect-component :fields='{{ json_encode($genders) }}' attri="{{ __('gender') }}" preselects=""
                                pholder="{{ __('Choose Your Gender') }}"></singleselect-component>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="modules" class="col-form-label text-md-right">Modules</label>
                            <div class="my-auto">
                                <multiselect-component :fields="{{ json_encode($modules->pluck('code_title')->all()) }}" attri="{{ __('modules[]') }}" :preselects="{{$empty_a}}"
                                 pholder="{{ __('Select Your Modules') }}"></multiselect-component>
                                @error('modules')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-teal col-12 mb-2">Create Account</button>
                        <a class="btn btn-light col-12" href="{{ route('login') }}" role="button">Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
