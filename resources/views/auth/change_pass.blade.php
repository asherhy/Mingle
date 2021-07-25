@extends( Auth::user()->allRoles()->contains('student') ? 'layouts.layout' :'layouts.mentor-layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center signup-row">
        <div class="col-10 col-md-7 col-lg-5">
            <div class="card signup border-sharp px-0 shadow-sm" id="signup-form">
                <div class="card-header signup-card-header">
                    <h3 class="text-left card-title mb-1 font-weight-bold">Change Password</h3>
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
                            <div class="col-12">
                                <button type="submit" class="btn btn-teal ladda-button col-12 submit-button my-1" data-style="expand-left"><span class="ladda-label">Update</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
