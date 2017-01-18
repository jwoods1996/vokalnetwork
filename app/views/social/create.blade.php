@extends('layout.master')

@section('createSection')
        @if (Auth::check()) 
        {{ Redirect::action('post.index')->withErrors($v) }}
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>Create account</div>
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