@extends('layouts.layout')

@section('content')
<div class="teal-container">
    <div class="container">
         <div class="row d-flex justify-content-center">
                    <div class="card col-12 col-sm-5 signup" id="signup-form">
                        <div class="card-header">
                            <p>Login</p>
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
                                    <div class="offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary col-12 create-account">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
