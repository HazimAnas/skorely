@extends('layouts.master')

@section('title', 'Register a New Account')

@section('content')
<div class="col-lg-6 center-block">
    <h2>Register</h2>
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <div class="form-group">
            Name
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            Email
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            Password
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            Confirm Password
            <input type="password" class="form-control" name="password_confirmation">
        </div>


        <div class="radio">
          <label>
            <input type="radio" name="type" id="plan1" value="free" checked>
            Basic - Free 
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="type" id="plan2" value="premium">
            Premium - $ 9.99 / year
          </label>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Register</button>
        </div>

    </form>

    @if (Session::has('errors'))   
        
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">   
                <p>{{ $error }}</p>    
            </div>
        @endforeach 
    @endif

</div>
@stop