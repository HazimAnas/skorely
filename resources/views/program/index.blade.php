@extends('layouts.sidebar')

@section('title', 'List all Program')

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif

	<table class="table">
		<p><a href="/programs/create"  class="btn btn-success">Create Program</a></p>
		<tr><th>#</th><th>Name</th></tr>
		@foreach ($programs as $index => $program)
		    <tr><td>{{ $index+1 }}</td><td><a href="/programs/{{ $program->id }}">{{ $program->name }}</a></td></tr>
		@endforeach
	</table>

@stop