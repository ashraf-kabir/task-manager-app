@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Change Password</div>

            <div class="card-body">
                <form action="{{ route('password.update-password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">Current Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
