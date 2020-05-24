@extends('layouts.app')

@section('title')
    Trashed Todos List
@endsection

@section('content')
    <h1 class="text-center md-2">Task Manager</h1>
    <div class="row justify-content-center">

        <div class="col-md-8 mb-2">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card card-default">
                <div class="card-header text-white bg-danger h5">Trashed Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if ($todos->count() > 0)
                            @foreach ($todos as $todo)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <br>
                                    <div class="btn-group btn-group-sm float-right" role="group" aria-label="pending">
                                        <a href="/trashed/restore/{{ $todo->id }}" class="btn btn-success">Restore</a>
                                        <a href="/trashed/{{ $todo->id }}/kill" class="btn btn-danger">Delete</a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <h5 class="text-center">No trashed todo</h5>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
