@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="card shadow">
                <div class="card-header p-3" style="background:#3aafa9; width:100%; border-top-left-radius:10px; border-top-right-radius:10px;">
                    <h3 class="text-center text-white m-0">Create new request</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form>
                            <div class="form-group mb-4">
                                <label for="description" class="col-form-label"><h5>Why are you applying for this role?</h5></label>
                                <div class="my-auto">
                                    <textarea type="description" class="form-control" id="description" style="height:150px;" placeholder="Start typing here..."></textarea>
                                </div>
                            </div>
                            <div class="form-group form-check ml-1">
                                <div class="form-row">
                                    <input class="form-check-input" type="checkbox" name="show-info" id="show-info">
                                    <label class="form-check-label" for="show-info">
                                        Allow Mingle to show your information to the owner of the post?
                                    </label>
                                </div>
                                <a class="text-muted" href="#"><small>See what information will be shared</small></a>
                            </div>
                            <div class="form-group form-row">
                                <button class="btn btn-success ml-auto" type="submit">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection