@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">My Profile</div>

            <div class="card-body">
                <form action="{{ route('profile.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $profile->phone ?? NULL }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ $profile->address ?? NULL }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="city" id="city" value="{{ $profile->city ?? NULL }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="state" id="state" value="{{ $profile->state ?? NULL }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip">Zip <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="zip" id="zip" value="{{ $profile->zip ?? NULL }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="country" id="country" value="{{ $profile->country ?? NULL }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
