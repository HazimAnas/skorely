@extends('layouts.master')

@section('title', 'Update Team')

@section('content')
<h2>Update Team</h2>
	{!! Form::model($team, ['method' => 'PATCH', 'route' => ['program.teams.update', $team->id]]) !!}
	  <div class="form-group">
	    <label for="name">Name</label>
	    {!! Form::text('name', null, ['class' => 'form-control']) !!}
	  </div>
	  <button type="submit" class="btn btn-default">Update</button>
	{!! Form::close() !!}
@stop