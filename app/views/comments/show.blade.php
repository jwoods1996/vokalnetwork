@extends('layout.master')

<!--Display the parent post-->
@section('singlePost')
<div class='postFeed'>
    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>
                <img src='{{{ $post->image }}}' width='50px'></img>
            </div>
            <div class='postDescription'>
                <span class='postTitle'>{{{ $post->title }}}</span></br>
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
    </div>
</div>
@stop

<!--Display the form for adding a comment-->
@section('commentForm')
    <div class='commentForm'>
        <span class='formTitle'>Add comment..</span>
    {{ Form::open(array('method' => 'PUT', 'action' => array('post.update', $post->id))) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('name', 'Name: ') }}</div>
           <span class='form-field'>{{ Form::text('name') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('name') }}</span>
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

<!--Display the list of comments-->
@section('comments')
    @foreach($comments as $comment)
        <div class='commentBox'>
            <div class='commentHeader'>
                <div class='commentDescription'>
                    <span class='commentName'>Posted by {{{ $comment->name}}}</span>
                </div>
                <div class='dropdown postOptions'>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href='{{{ url("delete_comment/$post->id/$comment->id") }}}'>Delete</a></li>
                    </ul>
                </div>
            </div>
            <div class='commentContent'>
                {{{ $comment->message }}}
            </div>
        </div>
    @endforeach
    <div class='bottomMessage'>No more comments</div>
    <div class='footer'></div>
@stop
