@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome <strong>{{ Auth::user()->name }}</strong><br>
                    You are logged in!
                </div>

                <div class="row justify-content-center mb-2">    
                    <div class="col-md-3 m-2">
                        <a href="/todos" style="text-decoration: none;">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center">Total Tasks</div>
                                <div class="card-body text-center">
                                    <h2>{{ $todos_count }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 m-2">
                        <a href="/todos" style="text-decoration: none;">
                            <div class="card text-white bg-danger">
                                <div class="card-header text-center">Pending Tasks</div>
                                <div class="card-body text-center">
                                    <h2>{{ $pending_todos }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 m-2">
                        <a href="/todos" style="text-decoration: none;">
                            <div class="card text-white bg-success">
                                <div class="card-header text-center">Completed Tasks</div>
                                <div class="card-body text-center">
                                    <h2>{{ $completed_todos }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center mb-2">
                    <a href="/new-todos" class="btn btn-primary float-left mr-1">Create New</a>
                    <a href="/todos" class="btn btn-dark float-right ml-1">View All Tasks</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
