@extends('layouts.app')

@section('title')
  Edit Todos
@endsection

@section('content')
  <h1 class="text-center md-2">Edit Todos</h1>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">Edit todo</div>
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
          <form action="/todos/{{ $todo->id }}/update-todos" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $todo->name }}">
            </div>
            <div class="form-group">
              <textarea name="description" cols="5" rows="5"
                        class="form-control todo_description">{{ $todo->description }}</textarea>
            </div>
            <div class="form-group">
              <input type="checkbox" name="pin_to_top" id="pin_to_top" {{ $todo->pin_to_top ? 'checked' : '' }}>
              <label for="pin_to_top">Pin to top</label>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Update Todo</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
