@extends('layout.master')
@section('userInfo')
@stop
@section('searchResults')

<div class='searchResults'>
	Showing {{ $resultCount }} results for "{{ $searchTerm }}".
	                    <div class='userSearch'>
                        {{ Form::open(array('method' => 'GET', 'action' => 'friend.index')) }}
                        {{ Form::label('searchTerm', 'Find a user:') }}<br>
                        {{ Form::text('searchTerm') }}
                        <span class='searchBtn'>
                        {{ Form::submit('Search') }}
                        </span><br>
                        <span style="color:yellow;font-style:italic;">{{ $errors->first('searchTerm') }}</span>
                        {{ Form::close() }}                        
                    </div>
</div>
<div class='userContainer'>
@foreach ($users as $user) 
	     <div class='personSummary'>
	         <div class='searchIcon'>
                    <?php $user = User::where('id', $user->id)->first(); ?>
                    @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                        <img src="{{ asset($user->image->url('thumb')) }}">
                    @else
                        <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                    @endif
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $user->fullname, $user->email) }}<br>
	             {{ $user->email }}<br>
	         </div>
	     </div>
@endforeach
</div>
@stop