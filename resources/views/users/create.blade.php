@extends('layouts.app')

@section('title')
  Create User
@endsection

@section('content')
  <h1 class="text-center md-2">Create User</h1>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">Create new user</div>
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
          <form action="/users/store" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
              <label for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <label for="is_admin">Admin Privileges <span class="text-danger">*</span></label>
              <select class="form-control" name="is_admin">
                <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Yes</option>
              </select>
            </div>
            <div class="form-group">
              <label for="is_active">Is Active <span class="text-danger">*</span></label>
              <select class="form-control" name="is_active">
                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function () {
      $('input[name="email"]').attr('autocomplete', 'off');
      $('input[name="password"]').attr('autocomplete', 'off');
    });
  </script>
@endsection

