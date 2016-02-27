@extends('layouts.master')

@section('title', 'Update Activity')

@section('content')
<h2>Update Activity</h2>
	{!! Form::model($activity, ['method' => 'PATCH', 'route' => ['program.activities.update', $activity->id]]) !!}
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