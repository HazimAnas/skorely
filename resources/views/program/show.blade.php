@extends('layouts.sidebar')

@section('title', $program->name)

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif

<table class="table">
	<tr><th>Name</th><td>{{ $program->name }}</td></tr>
	<tr><th>Description</th><td>{{ $program->description }}</td></tr>
	<tr><th>Created</th><td>{{ $program->created_at }}</td></tr>
</table>
	<p>
		<a href="/programs/{{ $program->id }}/edit"  class="btn btn-success">Edit Program</a>
		<a href="/programs/{{ $program->id }}/edit"  class="btn btn-success">Add Activity</a>
	</p>

@include('team.create')
	<table class="table">
		<tr><th>#</th><th>Name</th></tr>
		@foreach ($teams as $index => $team)
		    <tr><td>{{ $index+1 }}</td><td><a href="#">{{ $team->name }}</a></td></tr>
		@endforeach
	</table>
@stop