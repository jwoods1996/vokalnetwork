@extends('layout.master')

@section('postForm')
    <div class='postForm'>
        <span class='formTitle'>Create post..</span>
    {{ Form::open(array('action' => 'post.create')) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('name', 'Name: ') }}</div>
           <span class='form-field'>{{ Form::text('name') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('name') }}</span>
           <div class="form-title">{{ Form::label('title', 'Title: ') }}</div>
           <span class='form-field'>{{ Form::text('title') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('title') }}</span>
           <div class="form-title">{{ Form::label('message', 'Message: ') }}</div>
           <span class="form-field">{{ Form::text('message') }}</span><br>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('message') }}</span>
        </div>
        <div class='buttonBar'>
            {{ Form::submit('Post', array('class' => 'formButton saveButton')) }}
        </div>
    {{ Form::close() }}
    </div>
@stop
@section('postContainer')
@foreach ($posts as $post)
    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>
                <img src='{{{ $post->image }}}' width='50px' height='50px'>
            </div>
            <div class='postDescription'>
                <span class='postTitle'><a href='{{{ url("comments/$post->id") }}}'>{{{ $post->title }}}</a></span></br>
                <span class='postName'>Posted by {{{ $post->name}}}</span>
            </div>
            <div class='dropdown postOptions'>
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                  
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href='{{{ url("edit_post/$post->id") }}}'>Edit</a></li>
                  <li><a href='{{{ url("delete_post/$post->id") }}}'>Delete</a></li>
                </ul>
            </div>
        </div>
        <div class='postContent'>
            {{{ $post->message }}}
        </div>
        <div class='postComments'>
            <!--Get the total amount of comments for the relevant post-->
            <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'><a href='{{{ url("comments/$post->id") }}}'>View Comments</a></span>
        </div>
    </div>
@endforeach
@stop