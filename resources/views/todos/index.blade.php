@extends('layouts.app')

@section('title')
    Todos List
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
                <div class="card-header text-white bg-danger h5">Pending Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if ($todos->where('completed', 0)->count() > 0)
                            @foreach ($todos as $todo)
                                @if (!$todo->completed)
                                    <li class="list-group-item">
                                        {{ $todo->name }}
                                        <br>
                                        <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right ml-1">Delete</a>
                                        @if (!$todo->completed)
                                            <a href="/todos/{{ $todo->id }}/complete"  class="btn btn-warning btn-sm float-right">Mark Complete</a>
                                        @endif
                                        <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-1">View Details</a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <h5 class="text-center">No pending todos yet</h5>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header text-white bg-success h5">Completed Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if ($todos->where('completed', 1)->count() > 0)
                            @foreach ($todos as $todo)
                                @if ($todo->completed)
                                    <li class="list-group-item">
                                        {{ $todo->name }}
                                        <br>
                                        <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right ml-1">Delete</a>
                                        @if ($todo->completed)
                                            <a href="/todos/{{ $todo->id }}/incomplete"  class="btn btn-warning btn-sm float-right">Mark Incomplete</a>
                                        @endif
                                        <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mr-1">View Details</a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <h5 class="text-center">No completed todos yet</h5>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
