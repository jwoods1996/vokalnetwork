@extends('layout.master')

@section('loginSection')
        @if (Auth::check()) 
        {{ Auth::user()->username }}
        Logged in.
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>You are currently not logged in.<br>Login here.</div><div class='createLink'>Don't have an account? {{ link_to_route('user.create', 'Create an Account') }}</div>
        </div>
        {{ Form::open(array('url' => secure_url('user/login'), 'class' => 'loginForm')) }} 
            {{ Form::label('username', 'Username: ') }}
            {{ Form::text('username') }}<br><br>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::password('password') }}<br><br>
            {{  Session::pull('login_error') }}
            {{ Form::submit('Login') }}
        {{ Form::close() }}
        </div>
        @endif
@stop