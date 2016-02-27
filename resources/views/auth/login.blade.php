@extends('layouts.master')

@section('title', 'Login for Existing User')

@section('content')
<div class="col-lg-6 center-block">
    <h2>Login</h2>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div class="form-group">
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            Password
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Login</button>
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