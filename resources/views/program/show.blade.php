@extends('layouts.sidebar')

@section('title', $program->name)

@section('content')

<table class="table">
	<tr><th>Name</th><td>{{ $program->name }}</td></tr>
	<tr><th>Description</th><td>{{ $program->description }}</td></tr>
	<tr><th>Created</th><td>{{ $program->created_at }}</td></tr>
</table>

@stop