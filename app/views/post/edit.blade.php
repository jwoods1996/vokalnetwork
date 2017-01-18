@extends('layout.master')


@section('postForm')

    <div class='postForm'>
        <span class='formTitle'>Edit your post..</span>
        {{ Form::model($post, array('method' => 'PUT', 'action' => array('post.update', $post->id))) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('title', 'Title: ') }}</div>
           <span class='form-field'>{{ Form::text('title') }}</span><br>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('title') }}</span>
           <div class="form-title">{{ Form::label('privacy', 'Privacy: ') }}</div>
           <span class='form-field'>{{ Form::select('privacy', array('public' => 'Public', 'friends' => 'Friends', 'private' => 'Private'), $post->privacy)}}</span><br>
           <div class="form-title">{{ Form::label('message', 'Message: ') }}</div>
           <span class="post-input">{{ Form::textarea('message', '', array('rows' => '2', 'cols' => '40')) }}</span><br>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('message') }}</span>
        </div>
        <div class='buttonBar'>
            {{ Form::submit('Save', array('class' => 'formButton saveButton', 'value' => 'save')) }}
            {{ Form::close() }}
            {{ Form::open(array('method' => 'GET', 'action' => array('post.index', 'id' =>  Auth::user()->id ))) }}
            {{ Form::submit('Cancel', array('class' => 'formButton saveButton', 'value' => 'cancel')) }}
        </div>
    {{ Form::close() }}
    </div>


<!--{{ Form::open(array('method' => 'DELETE', 'route' => array('post.destroy', $post->id))) }}
{{ Form::submit('Delete') }}
{{ Form::close() }}-->
@stop