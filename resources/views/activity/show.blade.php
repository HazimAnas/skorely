@extends('layouts.master')

@section('title', $activity->name)

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif
<div class="panel panel-default">
	<div class="panel-body">
    	<h3>Activity Details</h3>
  	</div>
    <table class="table">
		<tr><th>Name</th><td>{{ $activity->name }}</td></tr>
		<tr><th>Description</th><td>{{ $activity->description }}</td></tr>
		<tr><th>Created</th><td>{{ $activity->created_at }}</td></tr>
	</table>
</div>
<div class="row">
	<div class="col-lg-12">

		<a href="/program/activities/{{ $activity->id }}/edit"  class="btn btn-success">Edit Activity</a>		

		{!! Form::open(['class' => 'form pull-right', 'method' => 'DELETE', 'route' => ['program.activities.destroy', $activity->id]]) !!}
		    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
		
	</div>
</div>

<hr>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Team Rank</h3>
		  	</div>
		  	@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<table class="table">
				<tr><th>#</th><th>Name</th><th>Point</th></tr>
				    <?php $i = 0 ?>
				@foreach ($points as $index => $point)
					<?php $i++ ?>
				    <tr>
				    	<td class="vert-align">{{ $i }}</td>
				    	<td class="vert-align">{{ $point['name'] }}</td>
				    	<td class="vert-align">{{ $point['amount'] }}</td>
				    	<td>
				    		{!! Form::open(array('url' => '/program/points', 'class' => 'form-inline')) !!}
							  <div class="form-group">
							    <input type="text" class="form-control" name="amount" placeholder="Amount" value="0">
							    <input type="hidden" class="form-control" name="id" value="{{ $point['id'] }}">
							    <input type="hidden" class="form-control" name="team" value="{{ $point['team_id'] }}">
							    <input type="hidden" class="form-control" name="activity" value="{{ $point['activity_id'] }}">
							  </div>
							  <button type="submit" class="btn btn-default">Add Point</button>
							{!! Form::close() !!}
				    	</td>
				    </tr>
				@endforeach

			</table>
		</div>
	</div>
</div>
@stop