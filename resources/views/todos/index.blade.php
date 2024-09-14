@extends('layouts.app')

@section('title')
    Todos List
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
                <div class="card-header text-white bg-danger h5">Pending Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if ($todos->where('completed', 0)->count() > 0)
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($todos as $todo)
                                @if (!$todo->completed)
                                    <li class="list-group-item">
                                        {{ $i++ }}.
                                        {{ $todo->name }}
                                        <br>
                                        <span style="font-size: 0.75rem;">Created at: {{ date('d M Y h:i a', strtotime($todo->created_at)) }}</span>
                                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="pending">
                                            @if (!$todo->completed)
                                                <a href="/todos/{{ $todo->id }}/complete" class="btn btn-success">Complete</a>
                                            @endif
                                            @if ($todo->pin_to_top)
                                                <a href="/todos/{{ $todo->id }}/unpin" class="btn btn-link">Unpin</a>
                                            @else
                                                <a href="/todos/{{ $todo->id }}/pin" class="btn btn-dark">Pin</a>
                                            @endif
                                            <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm">Details</a>
                                            <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger">Trash</a>
                                        </div>
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

        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header text-white bg-success h5">Completed Tasks</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if ($todos->where('completed', 1)->count() > 0)
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($todos as $todo)
                                @if ($todo->completed)
                                    <li class="list-group-item">
                                        {{ $i++ }}.
                                        {{ $todo->name }}
                                        <br>
                                        <span style="font-size: 0.75rem;">Updated at: {{ date('d M Y h:i a', strtotime($todo->updated_at)) }}</span>
                                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="completed">
                                            @if ($todo->completed)
                                                <a href="/todos/{{ $todo->id }}/incomplete" class="btn btn-warning">Incomplete</a>
                                            @endif
                                            @if ($todo->pin_to_top)
                                                <a href="/todos/{{ $todo->id }}/unpin" class="btn btn-link">Unpin</a>
                                            @else
                                                <a href="/todos/{{ $todo->id }}/pin" class="btn btn-dark">Pin</a>
                                            @endif
                                            <a href="/todos/{{ $todo->id }}" class="btn btn-primary">Details</a>
                                            <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger">Trash</a>
                                        </div>
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
