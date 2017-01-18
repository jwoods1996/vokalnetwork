@extends('layout.master')

@section('createSection')
        @if (Auth::check()) 
        {{ Auth::user()->email }}
        Logged in.
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>Create account</div><div class='createLink'>Already have an account? {{ link_to_route('user.index', 'Log in here') }}</div>
        </div>
        {{ Form::open(array('method' => 'POST', 'url' => secure_url('user'), 'class' => 'loginForm', 'files' => true)) }} 
            {{ Form::label('email', 'Email: ') }}
            <span class='form-field'>{{ Form::text('email') }}<br></span>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('email') }}<br></span>
            {{ Form::label('firstName', 'First Name: ') }}
            <span class='form-field'>{{ Form::text('firstName') }}<br></span>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('firstName') }}<br></span>
            {{ Form::label('lastName', 'Surname: ') }}
            <span class='form-field'>{{ Form::text('lastName') }}<br></span>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('lastName') }}<br></span>
            {{ Form::label('dob', 'Date of birth: ') }}
            <span class='form-field'>{{ Form::input('date', 'dob') }}<br></span>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('dob') }}<br></span>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::password('password') }}<br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('password') }}<br></span>
            {{ Form::label('image', 'Profile photo: ') }}<br>
            {{ Form::file('image') }}<br>
            {{ Form::submit('Create Account') }}
        {{ Form::close() }}
        </div>
        @endif
@stop