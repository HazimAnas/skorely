@extends('layouts.sidebar')

@section('title', 'Create Program')

@section('content')
<h2>Create Program</h2>
	<form action="/programs" method="POST">
	  <div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" class="form-control" name="name" placeholder="name">
	  </div>
	  <div class="form-group">
	    <label for="description">Description</label>
	    <textarea class="form-control" name="description" placeholder="Description"></textarea>
	  </div>
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <button type="submit" class="btn btn-default">Create</button>
	</form>
@stop