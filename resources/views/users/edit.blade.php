@extends('layouts.app')

@section('title')
  Edit User
@endsection

@section('content')
  <h1 class="text-center md-2">Edit User</h1>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">Edit user details</div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="list-group">
                @foreach ($errors->all() as $error)
                  <li class="list-group-item">
                    {{ $error }}
                  </li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- For updating, use the PUT method -->

            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Name" name="name"
                     value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" placeholder="Email" name="email"
                     value="{{ old('email', $user->email) }}" disabled>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" placeholder="Leave blank to keep current password"
                     name="password">
            </div>
            <div class="form-group">
              <label for="is_admin">Admin Privileges <span class="text-danger">*</span></label>
              <select class="form-control" name="is_admin">
                <option value="0" {{ old('is_admin', $user->is_admin) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_admin', $user->is_admin) == '1' ? 'selected' : '' }}>Yes</option>
              </select>
            </div>
            <div class="form-group">
              <label for="is_active">Is Active <span class="text-danger">*</span></label>
              <select class="form-control" name="is_active">
                <option value="1" {{ old('is_active', $user->is_active) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $user->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Update User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
