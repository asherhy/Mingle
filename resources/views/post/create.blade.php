@extends('layouts.layout')

@section('content')

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="card">
                <div class="card-header p-3" style="background:#3aafa9; width:100%; border-top-left-radius:10px; border-top-right-radius:10px;">
                    <h3 class="text-center text-white">Create New Post</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form>
                            <div class="form-group form-row mb-4">
                                <label for="title" class="col-form-label col-md-2">Title</label>
                                <div class="col-md-10"><input type="title" class="form-control" id="title"></div>
                            </div>
                            <div class="form-group form-row mb-4">
                                <label for="module" class="col-form-label col-md-2">Module</label>
                                <div class="col-md-10 my-auto">
                                    <select type="module" class="form-control" id="module">
                                        <option selected>Choose Your Module</option>
                                        <option value="1">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-row mb-4">
                                <label for="description" class="col-form-label col-md-2">Description</label>
                                <div class="col-md-10 my-auto">
                                    <textarea type="description" class="form-control" id="description" style="height:100px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <button class="btn btn-success ml-auto" type="submit">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection