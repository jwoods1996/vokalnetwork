@extends('layout.master')
@section('userProfile')
<div>
<div class='profileHeader'>
    <div class='profileIcon'>
            @if (Auth::user()->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                <img src="{{ $user->image->url('medium') }}">
            @else
                <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
            @endif
    </div>
    <div class='personInfo'>
        {{ Auth::user()->fullname }}<br>
        <span style='font-style:italic'>{{ Auth::user()->email }}</span><br>
        {{ $age . ' years old.' }}<br>
    
    </div>
    <div class='interact'>
    @if (Auth::check())
        {{--if the profile isn't the logged in user--}}
        @if ($user->id != Auth::user()->id)
            {{--if the user has friends--}}
            @if ($friends->count()>0)
                {{--check if logged in user is one of them--}}
                <?php $friendship = false; ?>
                @foreach ($friends as $friend)
                    @if ($friend->friend_id == Auth::user()->id)
                            {{ Form::open(array('method' => 'DELETE', 'action' => array('friend.destroy', $friend->id, 'friend_id' => $user->id, 'user_id' => Auth::user()->id))) }}
                            {{ Form::submit('Remove Friend', array('class' => 'friendBtn')) }}
                            {{ Form::close() }} 
                            <?php $friendship = true; ?>
                    @endif
                @endforeach
                @if (!$friendship) 
                    {{ Form::open(array('method' => 'POST', 'action' => array('friend.store', 'friend_id' => $user->id, 'user_id' => Auth::user()->id))) }}
                    {{ Form::submit('Add Friend', array('class' => 'friendBtn')) }}
                    {{ Form::close() }} 
                @endif
            @else

            @endif
        @endif
    @endif
    </div>
</div>
<div class='profileNavbar'>
        {{ link_to_route('user.show', 'Posts', $user->email, array('class' => 'profnavbtn')) }}
        {{ link_to_route('friend.show', 'Friends', $user->id, array('class' => 'profnavbtn')) }}
</div>
</div>
@stop
@section('friendsList')
<div class='userContainer'>
    @foreach ($friends as $friend)
	     <div class='personSummary'>
	         <div class='personIcon'>
                <div class='searchIcon'>
                        <?php $user = User::where('id', $friend->friend_id)->first(); ?>
                        @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                            <img src="{{ asset($user->image->url('thumb')) }}">
                        @else
                            <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                        @endif
                </div>  
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $user->fullname, $user->email) }}<br>
	             {{ $user->email }}<br>
	         </div>
	     </div>
    @endforeach
</div>
@stop