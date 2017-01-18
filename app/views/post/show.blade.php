@extends('layout.master')

<!--Display the parent post-->
@section('singlePost')
<div class='postFeed'>
    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>             
                <div class='userIcon'>
                        <?php $user = User::where('id', $post->user_id)->first(); ?>
                        @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                            <img src="{{ $user->image->url('thumb') }}">
                        @else
                            <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                        @endif
                </div>   
            </div>
                <div class='postDescription'>
                    <span class='postTitle'><a href='{{url("post/$post->id") }}'>{{{ $post->title }}}</a></span></br>
                    <?php $user_email = User::where('id', $post->user_id)->first()->email; ?>
                    <span class='postName'>Posted by <a href='{{url("user/$user_email") }}'>{{{ $post->name}}}</a></span>
                </div>
            @if (Auth::check())
            @if ($post->user_id == Auth::user()->id)
            <div class='dropdown postOptions'>
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                  
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                        {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                        {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
            @endif
            @endif
        </div>
        <div class='postContent'>
            {{{ $post->message }}}
        </div>
    </div>
</div>
@stop


<!--Display the list of comments-->
@section('comments')
    @if ($comments != 'null')
        {{ $comments->links() }}
        @foreach($comments as $comment)
            <div class='commentBox'>
                <div class='commentHeader'>
                    <div class='commentIcon'>
                    <div class='userIcon'>
                            <?php $user = User::where('id', $comment->user_id)->first(); ?>
                            @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                                <img src="{{ $user->image->url('thumb') }}">
                            @else
                                <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                            @endif
                    </div>
                    </div>   
                    @if (Auth::check())
                    @if ($comment->user_id == Auth::user()->id)
                    <div class='dropdown postOptions'>
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                            {{ Form::open(array('method' => 'DELETE', 'action' => array('comment.destroy', $comment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                          </li>
                        </ul>
                    </div>
                    @endif
                    @endif
                </div>
                <div class='commentContent'>
                    <div class='commentDescription'>
                        <?php $user_email = User::where('id', $comment->user_id)->first()->email; ?>
                        <span class='commentName'><a href='{{url("user/$user_email") }}'>{{{ $comment->name}}}</a></span>
                    </div>
                    {{{ $comment->message }}}
                </div>
            </div>
        @endforeach
        {{ $comments->links() }}
    @endif
@stop


<!--Display the form for adding a comment-->
@section('commentForm')
@if (Auth::check())
    <div class='commentForm'>
        <span class='formTitle'>Add comment..</span>
    {{ Form::open(array('action' => array('comment.store', 'postid' => $post->id, 'userid' => Auth::user()->id))) }}
            <div class='commentHeader'>
                <div class='userIcon'>
                    @if (Auth::check())   
                        <?php $user = Auth::user(); ?>
                        @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                            <img src="{{ $user->image->url('thumb') }}">
                        @else
                            <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                        @endif
                    @endif
                </div>
            </div>  
           <span class="comment-input">{{ Form::textarea('message', '', array('rows' => '2', 'cols' => '80')) }}</span><br>
        <div class='buttonBar'>
            {{ Form::submit('Post', array('class' => 'commentButton')) }}
        </div>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('message') }}</span>
    {{ Form::close() }}
    </div>
    <div class='footer'></div>
@endif
@stop