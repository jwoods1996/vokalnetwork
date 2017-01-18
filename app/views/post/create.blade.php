@extends('layout.master')
@section('postForm')
    <div class='postForm'>
    {{ Form::model(array('method' => 'PUT', 'route' => array('post.store'))) }}
        <span class='formTitle'>Edit post..</span>
        <div class='form-fields'>
           <div class="field-title">{{ Form::label('title', 'Title: ') }}</div>
           {{ Form::text('title') }}<br>
           <div class="field-title">{{ Form::text('name') }}</div>
           {{ Form::label('name', 'Name: ') }}<br>
           <div class="field-title">{{ Form::label('message', 'Message: ') }}</div>
           {{ Form::text('message') }}<br>
        </div>
        <div class='buttonBar'>{{ Form::submit('Update') }}</div>
    {{ Form::close() }}
    </div>

@stop