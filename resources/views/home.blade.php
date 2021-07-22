

@extends( Auth::user()->allRoles()->contains('student') ? 'layouts.layout' :'layouts.mentor-layout')

@section('content')
<div class="container min-vh-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-sharp">
                <div class="card-header bg-teal">
                    <h5 class="mb-0 text-white">{{ __('Dashboard') }}</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Welcome back ") . Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
