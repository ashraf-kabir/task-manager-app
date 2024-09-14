@extends('layouts.app')

@section('title')
    Create Todos
@endsection

@section('content')
    <h1 class="text-center md-2">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Create new todo</div>
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
                    <form action="/store-todos" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control todo_description" name="description" placeholder="Description"
                                      cols="5" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="pin_to_top" id="pin_to_top">
                            <label for="pin_to_top">Pin to top</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
