@extends('layouts.app')

@section('title')
    Users List
@endsection

@section('content')
    <h1 class="text-center md-2">Task Manager</h1>
    <div class="row justify-content-center">

        <div class="col-md-12 mb-2">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">Users</div>
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add User</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped border rounded">
                          <thead class="thead-dark">
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Active</th>
                              <th>Created</th>
                              <th>Actions</th>
                          </thead>
                          <tbody>
                              @if ($users->count() > 0)
                                  @php
                                  $i = 1;
                                  @endphp
                                  @foreach ($users as $user)
                                      <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>
                                              @if (!$user->is_admin)
                                                  <span class="badge badge-danger">User</span>
                                              @else
                                                  <span class="badge badge-success">Admin</span>
                                              @endif
                                          </td>
                                          <td>
                                              @if ($user->is_active)
                                                  <span class="badge badge-success">Active</span>
                                              @else
                                                  <span class="badge badge-danger">Inactive</span>
                                              @endif
                                          </td>
                                          <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                          <td>
                                              @if (!$user->is_admin)
                                                  <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                                      @csrf
                                                      <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                                  </form>
                                              @endif
                                              @if ($user->id != 1 && auth()->user()->id == 1 && $user->is_admin)
                                                  <form action="{{ route('users.make-regular', $user->id) }}" method="POST">
                                                      @csrf
                                                      <button type="submit" class="btn btn-danger btn-sm">Remove Admin</button>
                                                  </form>
                                              @endif
                                              @if ($user->id != auth()->user()->id)
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                              @else
                                                <a href="/profile" class="btn btn-primary btn-sm">Edit</a>
                                              @endif
                                              @if (auth()->user()->id != $user->id)
                                                  @if ($user->is_active)
                                                      <form action="{{ route('users.make-inactive', $user->id) }}" method="POST">
                                                          @csrf
                                                          <button type="submit" class="btn btn-danger btn-sm">Make Inactive</button>
                                                      </form>
                                                  @else
                                                      <form action="{{ route('users.make-active', $user->id) }}" method="POST">
                                                          @csrf
                                                          <button type="submit" class="btn btn-success btn-sm">Make Active</button>
                                                      </form>
                                                  @endif
                                              @endif
                                          </td>
                                      </tr>
                                  @endforeach
                              @else
                                  <tr>
                                      <td colspan="5" class="text-center">No user found</td>
                                  </tr>
                              @endif
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
