@extends('layouts.app')

@section('title')
    Todos List
@endsection

@section('content')
    <h1 class="text-center my-5">Todos Page</h1>
    <div class="row justify-content-center">

        <div class="col-md-8 mb-2">
            <div class="card card-default">
                <div class="card-header">Pending Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $todo)
                            @if (!$todo->completed)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right ml-1">Delete</a>
                                    @if (!$todo->completed)
                                        <a href="/todos/{{ $todo->id }}/complete" style="color: #fff;" class="btn btn-warning btn-sm float-right">Mark Complete</a>
                                    @endif
                                    <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-1">View</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Completed Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $todo)
                            @if ($todo->completed)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right ml-1">Delete</a>
                                    <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right">View</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
@endsection
