@extends('layouts.master')

@section('title', $team->name)

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif

   	<h2>{{ $team->name }}</h2>
	<p>Created : {{ $team->created_at }}</p>
	
	<hr>
	
	<div class="row">
		<div class="col-lg-12">

			<a href="/program/teams/{{ $team->id }}/edit"  class="btn btn-success">Edit Team</a>		

			{!! Form::open(['class' => 'form pull-right', 'method' => 'DELETE', 'route' => ['program.teams.destroy', $team->id]]) !!}
			    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
			
		</div>
	</div>

	<hr>

	<div class="row">

	</div>
@stop