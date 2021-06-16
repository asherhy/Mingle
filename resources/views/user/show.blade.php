@extends('layouts.layout')

@section('content')

<div class="modal fade" id="editProfileModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
        <div class="modal-content" style="border-radius:15px;">
            <div class="modal-header" style="background-color: #3aafa9; border-top-left-radius:15px; border-top-right-radius:15px">
                <h3 class="modal-title text-white">Edit Profile</h3>
                <button type="button ml-auto" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="form-group form-row">
                            <label for="name" class="col-form-label col-md-4">Name</label>
                            <div class="col-md-8"><input type="name" class="form-control" id="name" value="{{ Auth::user()->name }}"></div>
                        </div>
                        <div class="form-group form-row">
                            <label for="profile-img" class="col-form-label col-md-4">Update Profile Image</label>
                            <div class="col-md-8">
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="email" class="col-form-label col-md-4">Email</label>
                            <div class="col-md-8"><input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"></div>
                        </div>
                        <div class="form-group form-row">
                            <label for="telegram" class="col-form-label col-md-4">Telegram</label>
                            <div class="col-md-8"><input type="telegram" class="form-control" id="telegram" value="{{ Auth::user()->telegram }}"></div>
                        </div>
                        <div class="form-group form-row">
                            <label for="major" class="col-form-label col-md-4">Major</label>
                            <div class="col-md-8 my-auto">
                                <select type="major" class="form-control" id="major">
                                    <option selected>Choose Your Major</option>
                                    <option value="1">-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="matric-year" class="col-form-label col-md-4">Matric Year</label>
                            <div class="col-md-8 my-auto">
                                <select type="matric-year" class="form-control" id="matric-year">
                                    <option selected>Choose Your Matric Year</option>
                                    <option value="1">-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="gender" class="col-form-label col-md-4">Gender</label>
                            <div class="col-md-8 my-auto">
                                <select type="gender" class="form-control" id="gender">
                                    <option selected>Choose Your Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <button class="btn btn-success ml-auto" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center">
        <div class="card col-10">
            <div class="row g-0 p-0">
                <div class="col-md-4 text-center p-3" style="background-color: #3aafa9; border-top-left-radius:10px; border-bottom-left-radius:10px;">
                    <div class="profile-image m-3">
                        <img src="/images/avatars/{{ Auth::user()->avatar }}" style="width:70%; border-radius:50%;" alt="User-Profile-Image">
                    </div>
                    <h3 class="mt-5">{{ Auth::user()->name }}</h3>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title pb-3 border-bottom text-dark text-left">Information</h3>
                        <div class="row p-2">
                            <div class="col-sm-6 mb-2">
                                <h3 class="text-dark text-left">Email</h3>
                                <p class="card-text text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <h3 class="text-dark text-left">Telegram</h3>
                                <p class="card-text text-muted">{{ Auth::user()->telegram }}</p>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6 mb-2">
                                <h3 class="text-dark text-left">Major</h3>
                                <p class="card-text text-muted">{{ Auth::user()->major }}</p>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <h3 class="text-dark text-left">Matric Year</h3>
                                <p class="card-text text-muted">{{ Auth::user()->matric_year }}</p>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6 mb-2">
                                <h3 class="text-dark text-left">Gender</h3>
                                <p class="card-text text-muted">{{ Auth::user()->gender }}</p>
                            </div>
                        </div>
                        <h3 class="card-title pb-3 border-bottom text-dark text-left">Modules</h3>
                        <div class="row p-2"><button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#editProfileModal">
                            Edit
                        </button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection