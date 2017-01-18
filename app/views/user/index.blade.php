@extends('layout.master')
@section('userInfo')
@section('loginSection')
        @if (Auth::check()) 
        {{ Redirect::action('post.index') }}
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>You are currently not logged in.<br>Login here.</div><div class='createLink'>Don't have an account? {{ link_to_route('user.create', 'Create an Account') }}</div>
        </div>
        {{ Form::open(array('url' => secure_url('user/login'), 'class' => 'loginForm')) }} 
            {{ Form::label('email', 'Email: ') }}
            <div class='form-field'>{{ Form::text('email') }}<br></div>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('email') }}<br></span>
            {{ Form::label('password', 'Password: ') }}
            <div class='form-field'>{{ Form::password('password') }}<br></div>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('password') }}<br></span>
            <span style="color:yellow; font-style:italic; font-weight:bold; font-size: 16pt">{{  Session::pull('login_error') }}</span>
            {{ Form::submit('Login') }}
        {{ Form::close() }}
        </div>
        @endif
@stop