@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center qm-row">
        <div class="col-12 col-sm-10 col-lg-8">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                            <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            <div class="card border-sharp px-0">
                <div class="card-header p-3 bg-teal">
                    <h3 class="text-center text-white font-weight-bold">Quick Match Your Module Group</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('quickmatch.module.store') }}">
                            @csrf
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
                            <modulematch-component></modulematch-component>

                            <div class="form-group form-row mb-4">
                                <label for="description" class="col-form-label col-md-2">Intro Yourself!</label>
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
                                <button class="btn btn-teal ml-auto" type="submit">Match</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection