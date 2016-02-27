@extends('layouts.master')

@section('title', 'Update Program')

@section('content')
<h2>Update Program</h2>
	{!! Form::model($program, ['method' => 'PATCH', 'route' => ['programs.update', $program->id]]) !!}
	  <div class="form-group">
	    <label for="name">Name</label>
	    {!! Form::text('name', null, ['class' => 'form-control']) !!}
	  </div>
	  <div class="form-group">
	    <label for="description">Description</label>
	    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	  </div>
	  <button type="submit" class="btn btn-default">Update</button>
	{!! Form::close() !!}
@stop