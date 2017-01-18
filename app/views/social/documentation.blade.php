@extends('layouts.master')

@section('documentation')
<h1>ER Diagram</h1>
    <img src="{{{ url('assets/ERDiagram.PNG') }}}" padding="200px" width="100%">
<h1>Explanations</h1>
<div class='documentationBox'>
    Most of the assignment requirements were completed with this website. 
    All the main functionality works perfectly (a user can create a post, edit 
    or delete that post, view a post’s comments, and delete those comments, 
    etc.). <br><br>
    Primary keys of posts and comments (postid and commentid) were appended to 
    the url when performing actions on the post/comment, and the relevant routes 
    would extract that id from the url and store it as a variable to work with, 
    collecting the relevant information and performing the necessary actions.<br><br>
    Posts are displayed from most recent to least recent, but comments are 
    displayed in the opposite order so a user can read the conversation from 
    top to bottom.<br><br>
    Time was spent on the CSS of the site, to make it look aesthetically pleasing
    and to apply common design principles to it. However, the page is not as 
    responsive as is desirable.<br><br>
    The site is also lacking in appropriate SQL sanitisation.<br><br>
    Placeholder features, such as items in the navigation, and the user 
    information section, were added in preparation for future additions.
</div>
@stop