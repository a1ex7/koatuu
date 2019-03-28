@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            People
        </div>

        {{ Form::open(['route' => 'peoples.store', 'method' => 'POST', 'id' => 'territory-form']) }}

        <div class="form-group {{ $errors->has('name') ? 'has-error text-danger' :'' }}">
            {{ Form::label('name', 'FIO', ['class' => 'form-label']) }}
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter FIO...']) }}
            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error text-danger' :'' }}">
            {{ Form::label('email', 'E-Mail', ['class' => 'form-label']) }}
            {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter email...']) }}
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        {{ Form::label('territory', 'Territory', ['class' => 'form-label']) }}

        <div class="form-group">
            {{ Form::select('region', $regions, old('region'), ['class' => 'form-control chosen-select', 'placeholder' => 'Select region...', 'id' => 'region']) }}
        </div>

        <div class="form-group">
            {{ Form::select('city', [], old('city'), ['class' => 'form-control chosen-select', 'placeholder' => 'Select city...', 'id' => 'city']) }}
        </div>

        <div class="form-group">
            {{ Form::select('district', [], old('district'), ['class' => 'form-control chosen-select', 'placeholder' => 'Select district...', 'id' => 'district']) }}
        </div>

        <div class="form-group {{ $errors->has('territory_id') ? 'has-error text-danger' :'' }}">
            {{ Form::hidden('territory_id') }}
            @if ($errors->has('territory_id'))
                <span class="help-block">
                    {{ $errors->first('territory_id') }}
                </span>
            @endif
        </div>

        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

@endsection
