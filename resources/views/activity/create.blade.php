@extends('layouts.sidebar')

@section('title', 'Create Activity')

@section('content')
<h2>Create Program</h2>
	{!! Form::open(array('url' => '/programs')) !!}
	  <div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" class="form-control" name="name" placeholder="name">
	  </div>
	  <div class="form-group">
	    <label for="description">Description</label>
	    <textarea class="form-control" name="description" placeholder="Description"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Create</button>
	{!! Form::close() !!}
@stop