@extends('layouts.app')

@section('title')
    Single Todo: {{ $todos->name }}
@endsection

@section('content')
    <h1 class="text-center md-2">{{ $todos->name }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card-header">Details</div>
                <div class="card-body">
                    {{ $todos->description }}
                    <br>
                    <span style="font-size: 0.75rem;">Created at: {{ date('d M Y h:i a', strtotime($todos->created_at)) }}</span>
                    <br>
                    <span style="font-size: 0.75rem;">Updated at: {{ date('d M Y h:i a', strtotime($todos->updated_at)) }}</span>
                </div>
            </div>
            <a href="/todos" style="color: #fff;" class="btn btn-dark btn-sm my-2">Todos List</a>
            <a href="/todos/{{ $todos->id }}/edit" style="color: #fff;" class="btn btn-info btn-sm my-2">Edit</a>
            <a href="/todos/{{ $todos->id }}/delete" class="btn btn-danger btn-sm my-2">Trash</a>
        </div>
    </div>
@endsection
