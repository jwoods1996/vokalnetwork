@extends('layout.master')

@section('postForm')
    @if (Auth::check()) 
    <div class='postForm'>
        <span class='formTitle'>Create a post..</span>
        {{ Form::open(array('action' => array('post.store', 'id' =>  Auth::user()->id ))) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('title', 'Title: ') }}</div>
           <span class='form-field'>{{ Form::text('title') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('title') }}</span>
           <div class="form-title">{{ Form::label('privacy', 'Privacy: ') }}</div>
           <span class='form-field'>{{ Form::select('privacy', array('public' => 'Public', 'friends' => 'Friends', 'private' => 'Private'), 'Public')}}</span><br>
           <div class="form-title">{{ Form::label('message', 'Message: ') }}</div>
           <span class="post-input">{{ Form::textarea('message', '', array('rows' => '2', 'cols' => '40')) }}</span><br>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('message') }}</span>
        </div>
        <div class='buttonBar'>
            {{ Form::submit('Post', array('class' => 'formButton saveButton')) }}
        </div>
    {{ Form::close() }}
    </div>
    @endif
@stop
@section('postContainer')
<div class='postContainer'>
@foreach ($posts as $post)
    <?php $user = User::where('id', $post->user_id)->first(); ?>
    @if ($post->privacy == 'public')
        <div class='postBox'>
            <div class='postHeader'>
                <div class='postIcon'>
                <div class='userIcon'>
                        <?php $user = User::where('id', $post->user_id)->first(); ?>
                        @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                            <img src="{{ asset($user->image->url('thumb')) }}">
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
            <div class='postComments'>
                <!--Get the total amount of comments for the relevant post-->
                <?php
                		$comments = $post->comments;
            	 	            $commentsAmount = count($comments);
            	 	            $post->commentsAmount = $commentsAmount;
            	 	      ?>
                <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'><a href='{{url("post/$post->id") }}'>View Comments</a></span>
            </div>
        </div>
    @endif
    @if ($post->privacy == 'private')
    @if (Auth::check())
    @if ($post->user_id == Auth::user()->id)
        <div class='postBox'>
            <div class='postHeader'>
                <div class='postIcon'>
                    <img src='{{{ $post->image }}}' width='50px' height='50px'>
                </div>
                <div class='postDescription'>
                    <span class='postTitle'><a href='{{url("post/$post->id") }}'>{{{ $post->title }}}</a></span></br>
                    <?php $user_email = User::where('id', $post->user_id)->first()->email; ?>
                    <span class='postName'>Posted by <a href='{{url("user/$user_email") }}'>{{{ $post->name}}}</a></span>
                </div>
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
            </div>
            <div class='postContent'>
                {{{ $post->message }}}
            </div>
            <div class='postComments'>
                <!--Get the total amount of comments for the relevant post-->
                <?php
                		$comments = $post->comments;
            	 	            $commentsAmount = count($comments);
            	 	            $post->commentsAmount = $commentsAmount;
            	 	      ?>
                <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                <a href='{{url("post/$post->id") }}'>View Comments</a></span>
            </div>
        </div>    
    @endif
    @endif
    @endif
    @if ($post->privacy == 'friends')

        @if (Auth::check())
            @if (Auth::user()->friends->count()>0)
                @foreach (Auth::user()->friends as $friend)
                    @if ($friend->friend_id == $post->user_id)
                    <div class='postBox'>
                <div class='postHeader'>
                    <div class='postIcon'>
                        <div class='thumbIcon'>
                            @if (Auth::check() AND $user->id == Auth::user()->id)   
                                <img src="{{ asset(Auth::user()->image->url('thumb')) }}">
                            @else
                                @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                                    <img src="{{ asset($user->image->url('thumb')) }}">
                                @else
                                    <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                                @endif
                            @endif
                        </div>
                    </div>
                <div class='postDescription'>
                    <span class='postTitle'><a href='{{url("post/$post->id") }}'>{{{ $post->title }}}</a></span></br>
                    <?php $user_email = User::where('id', $post->user_id)->first()->email; ?>
                    <span class='postName'>Posted by <a href='{{url("user/$user_email") }}'>{{{ $post->name}}}</a></span>
                </div>
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
                </div>
                <div class='postContent'>
                    {{{ $post->message }}}
                </div>
                <div class='postComments'>
                    <!--Get the total amount of comments for the relevant post-->
                    <?php
                    		$comments = $post->comments;
                	 	            $commentsAmount = count($comments);
                	 	            $post->commentsAmount = $commentsAmount;
                	 	      ?>
                    <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                    <a href='{{url("post/$post->id") }}'>View Comments</a></span>
                </div>
            </div> 
                    @endif
                @endforeach
            @else

            @endif
        @if ($post->user_id == Auth::user()->id)
            <div class='postBox'>
                <div class='postHeader'>
                    <div class='postIcon'>
                        <img src='{{{ $post->image }}}' width='50px' height='50px'>
                    </div>
                    <div class='postDescription'>
                        <span class='postTitle'><a href='{{url("post/$post->id") }}'>{{{ $post->title }}}</a></span></br>
                        <span class='postName'>Posted by {{{ $post->name}}}</span>
                    </div>
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
                </div>
                <div class='postContent'>
                    {{{ $post->message }}}
                </div>
                <div class='postComments'>
                    <!--Get the total amount of comments for the relevant post-->
                    <?php
                    		$comments = $post->comments;
                	 	            $commentsAmount = count($comments);
                	 	            $post->commentsAmount = $commentsAmount;
                	 	      ?>
                    <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                    <a href='{{url("post/$post->id") }}'>View Comments</a></span>
                </div>
            </div> 
        @endif
		@endif
    @endif
@endforeach
</div>
@stop


