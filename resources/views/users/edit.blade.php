@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">My Profile</div>
        
            <div class="card-body">
                <form action="{{ route('users.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
        
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
        
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
        
                    <button type="submit" class="btn btn-success">Update profile</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
