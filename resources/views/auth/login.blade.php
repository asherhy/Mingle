@extends('layouts.layout')

@section('content')
<div class="container min-vh-100">
    <div class="row d-flex justify-content-center login-row">
        <div class="col-10 col-md-7 col-lg-5">
            <div class="card signup border-sharp px-0 shadow-sm" id="signup-form">
                <div class="card-header login-card-header">
                    <h3 class="text-left card-title mb-1 font-weight-bold">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="signup" action="{{ route('login') }}">
                        @csrf
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-teal col-12 create-account">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
