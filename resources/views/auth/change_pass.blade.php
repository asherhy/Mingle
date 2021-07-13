@extends('layouts.layout')

@section('content')
<div class="teal-container">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card col-12 col-sm-5 signup" id="signup-form">
                <div class="card-header">
                    <p>Change Password</p>
                </div>

                <div class="card-body">
                    <form method="POST" class="signup" action="{{ route('updatePw')}}" id="changeForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="oldPassword" class="col-form-label text-md-left">{{ __('Old Password') }}</label>
                            <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="new-password">

                            @error('oldPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group ">
                            <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Update</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
