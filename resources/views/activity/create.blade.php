@extends('layouts.sidebar')

@section('title', 'Create Activity')

@section('content')
<h2>Create Activity</h2>
	{!! Form::open(array('url' => 'program/activities')) !!}
	  <div class="form-group">
	    <label for="name">Name</label>
	    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
	  </div>
	  <div class="form-group">
	    <label for="description">Description</label>
	    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'description']) !!}
	  </div>
	  <button type="submit" class="btn btn-default">Create</button>
	{!! Form::close() !!}
@stop