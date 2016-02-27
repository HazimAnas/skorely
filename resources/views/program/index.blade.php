@extends('layouts.master')

@section('title', 'List all Program')

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif
	<h1>My Programs</h1>
	<h3>List of all your programs</h3>

	<a href="/programs/create"  class="btn btn-success">Create New Program</a>

	<hr>
		@foreach ($programs as $index => $program)
		<h2>{{ $program->name }}</h2>
		<h4>{{ $program->description }}</h4>
		<p>
			<a href="/programs/{{ $program->id }}" class="btn btn-primary">View Program</a>
			<a href="/programs/{{ $program->id }}/edit"  class="btn btn-success">Edit Program</a>			
    	</p>
    	<div class="clearfix"></div>
        <hr>
    
		@endforeach

@stop