@extends( Auth::user()->allRoles()->contains('student') ? 'layouts.layout' :'layouts.mentor-layout')

@section('content')
<div class="container min-vh-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-sharp px-0">
                <div class="card-header bg-teal">
                    <h3 class="text-white text-left font-weight-bold">{{ __('Verify Your Email Address') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you cannot find it in your inbox, please check your spam folder.')}}<br><br>
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
