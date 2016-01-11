@extends('layouts.sidebar')

@section('title', $program->name)

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif
<div class="panel panel-default">
	<div class="panel-body">
    	<h3>Program Details</h3>
  	</div>
    <table class="table">
		<tr><th>Name</th><td>{{ $program->name }}</td></tr>
		<tr><th>Description</th><td>{{ $program->description }}</td></tr>
		<tr><th>Created</th><td>{{ $program->created_at }}</td></tr>
	</table>
</div>

	<p>
		<a href="/programs/{{ $program->id }}/edit"  class="btn btn-success">Edit Program</a>		
	</p>

<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Team List</h3>
		    	@include('team.create')
		  	</div>
			<table class="table">
				<tr><th>#</th><th>Name</th></tr>
				@foreach ($teams as $index => $team)
				    <tr><td>{{ $index+1 }}</td><td><a href="#">{{ $team->name }}</a></td></tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Activity List</h3>
		    	<a href="/program/activities/create"  class="btn btn-success">Add Activity</a>
		  	</div>
			<table class="table">
				<tr><th>#</th><th>Name</th></tr>
				@foreach ($activities as $index => $activity)
				    <tr><td>{{ $index+1 }}</td><td><a href="#">{{ $activity->name }}</a></td></tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@stop