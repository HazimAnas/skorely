@extends('layouts.master')

@section('title', $program->name)

@section('content')

	@if (Session::has('message'))	
		<div class="alert alert-success">	
			<p>{{ Session::get('message') }}</p>	
		</div>	
	@endif
	@if (Session::has('errors'))   
        
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">   
                <p>{{ $error }}</p>    
            </div>
        @endforeach 
    @endif

   	<h2>{{ $program->name }}</h2>
	<p>{{ $program->description }}</p>
	<p>Created : {{ $program->created_at }}</p>
	
	<hr>
	
	<div class="row">
		<div class="col-lg-12">

			<a href="/programs/{{ $program->id }}/edit"  class="btn btn-success">Edit Program</a>		

			{!! Form::open(['class' => 'form pull-right delete', 'method' => 'DELETE', 'route' => ['programs.destroy', $program->id]]) !!}
			    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=> "return confirmation();"]) !!}
			{!! Form::close() !!}
			
		</div>
	</div>

	<hr>

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
					    <tr>
					    	<td class="vert-align">{{ $index+1 }}</td><td class="vert-align"><a href="/program/teams/{{ $team->id }}">{{ $team->name }}</a></td>
						   	<td>
					    		{!! Form::open([ 'class' => 'delete', 'method' => 'DELETE', 'route' => ['program.teams.destroy', $team->id]]) !!}
					                {!! Form::submit('Delete', ['class' => 'btn btn-danger',  'onclick'=> "return confirmation();"]) !!}
					            {!! Form::close() !!}
					        </td>
				        </tr>
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
					    <tr><td>{{ $index+1 }}</td><td><a href="/program/activities/{{ $activity->id }}">{{ $activity->name }}</a></td></tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Team Rank</h3>
			  	</div>
				<table class="table">
					<tr><th>#</th><th>Name</th><th>Points</th></tr>
					@foreach ($rank as $index => $team)
					    <tr>
					    	<td class="vert-align">{{ $index+1 }}</td>
					    	<td class="vert-align"><a href="/program/teams/{{ $team['id'] }}">{{ $team['name'] }}</a></td>
						   	<td class="vert-align">{{ $team['points'] }}</td>
				        </tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
	    <script>
    function confirmation() {
    $('.delete').submit(function(e) {
        var currentForm = this;
        e.preventDefault();
        bootbox.confirm({
        	   	size: 'medium',
			    message: "Are you sure?", 
			    backdrop: false,
			    callback: function(result){
			     	 if (result) {
                		currentForm.submit();
		            	}
		            	bootbox.hideAll(); 
			 	}
			});
    })};
    </script>
@stop

