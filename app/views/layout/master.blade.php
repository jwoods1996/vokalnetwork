<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vokal</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{{ secure_url('css/style.css') }}}" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class='col-sm-3'>
                <div class='sidebar'>
                    <a href="{{{ url('post') }}}" class="logo">Vokal</a></br>
                    <div class='userInfo'>
                        @if (Auth::check()) 
                            <div class='userIcon'>
                                <div class='thumbIcon'>
                                        @if (Auth::user()->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                                            <img src="{{ asset($user->image->url('thumb')) }}">
                                        @else
                                            <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                                        @endif
                                </div>  
                            </div>              
                            <div class='userName'>
                                Logged in as:</br>
                    <?php $user_email = Auth::user()->email ?>
                    <a href='{{url("user/$user_email") }}'>{{ Auth::user()->fullname }}</a>
                                
                            </div><!-- User Info -->   
                        @else            
                            <div class='userName'>
                                Not logged in<br>
                                <a style="color:orange" href="{{{ url('user') }}}">Login here</a>
                            </div><!-- User Info -->  
                        @endif
                    </div>
                    <div class='userSearch'>
                        {{ Form::open(array('method' => 'GET', 'action' => 'friend.index')) }}
                        {{ Form::label('searchTerm', 'Find a user:') }}<br>
                        <span class='form-field'>{{ Form::text('searchTerm') }}</span>
                        <span class='searchBtn'>
                        {{ Form::submit('Search') }}
                        </span><br>
                        <span style="color:yellow;font-style:italic;">{{ $errors->first('searchTerm') }}</span>
                        {{ Form::close() }}                        
                    </div>
                    <!--Navigation Menu-->
                    <div class='nav-bar'>
                    <ul>
                        <li><a href="{{{ url('post') }}}" class="navbtn">Home</a></li>
                        @if (Auth::check())
                        <li>{{ link_to_route('user.show', 'Profile', Auth::user()->email, array('class' => 'navbtn')) }}</li>
                        @endif
                        @if (Auth::check())
                        <li>{{ link_to_route('friend.show', 'Friends', Auth::user()->id, array('class' => 'navbtn')) }}</li>
                        @endif
                        <li><a href="{{{ url('documentation') }}}" class="navbtn">Documentation</a></li>
                        @if (Auth::check())
                        <li>{{ link_to_route('user.logout', 'Logout', Auth::user()->id, array('class' => 'navbtn')) }}</li>
                        @endif

                    </ul>                        
                    </div>


                </div><!-- Sidebar -->
            </div>
            <div class='col-sm-1'></div>
            <div class='col-sm-8'>
                @section('loginSection')
                @show
                @section('createSection')
                @show
                @section('postForm')
                @show
                @section('postEditor')
                @show
                @section('postContainer')
                @show
                @section('singlePost')
                @show
                @section('comments')
                @show
                @section('commentForm')
                @show
                @section('documentation')
                @show
                @section('searchResults')
                @show
                @section('userProfile')
                @show
                @section('userPosts')
                @show
                @section('friendsList')
                @show
                
            </div>
        </div><!-- /.container -->
    </body>
</html>