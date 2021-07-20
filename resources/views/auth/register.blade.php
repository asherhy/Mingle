@extends('layouts.layout')

@section('content')

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
            
                        <button type="submit" class="btn btn-teal col-12 mb-2">Create Account</button>
                        <a class="btn btn-light col-12" href="{{ route('login') }}" role="button">Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
