@extends('layouts.sidebar')

@section('title', 'Create Program')

@section('content')
<h2>Create Program</h2>
	{!! Form::open(array('url' => '/programs')) !!}
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