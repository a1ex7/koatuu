@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            People
        </div>

        <div class="lead">
            <p>FIO: {{ $people->name }}</p>
            <p>E-mail: {{ $people->email }}</p>
            <p>Territory: {{ $people->territory->ter_address }}</p>
        </div>

        <div class="links">
            <a class="btn btn-outline-primary" href="{{ route('peoples.create') }}">Add new</a>
        </div>

    </div>
@endsection
