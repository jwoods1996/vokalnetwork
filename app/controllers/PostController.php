<?php

class PostController extends \BaseController {

public function index()
{
	//Order all posts by created time descending
	$posts = Post::orderBy('created_at', 'DESC')->get();
	if (Auth::check()) {
		//Find the friends of the logged in user
		$friends = User::find(Auth::user()->id)->friends;
	}
	return View::make('post.index', compact('posts')); 
}


/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
public function create()
{
	return View::make('post.create');
}


/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
public function store()
{
	//Retrieve the value from the URL to found the USer object
	$id = $_GET['id'];
	$user = User::where("id", $id)->first();
	$post = new Post;
	//Validate the input
	$input = Input::all();
	$v = Validator::make($input, Post::$rules);
	if ($v->passes()) {
		//Insert data into posts object
		$post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
	    $post->name = Auth::user()->fullname;
	    $post->title = $input['title'];
	    $post->privacy = $input['privacy'];
	    $post->message = $input['message'];
	    $post->commentsAmount = 0;
	    
	    //Save the post as belonging to a user
	    $user->posts()->save($post); 
		return Redirect::route('post.index');
	} else {
		return Redirect::action('post.index')->withErrors($v);
	}
}


/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function show($id)
{
	//Find the post to display
	$post = Post::find($id);
	//If the post has any comments, proceed to find those comments and paginate them
	if ($post->comments->count()>0) {
		$comments = Comment::where('post_id', $id)->paginate(6);
	} else {
		//If not, set comments to null
		$comments = 'null';
		$comment = 'null';
	}

	return View::make('post.show', compact('post', 'comments', 'comment'));

}


/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function edit($id)
{
	$post = Post::find($id);
	//Check if the author of the post is the logged in user
	if ($post->user_id == Auth::user()->id){
		return View::make('post.edit')->withPost($post);
	}
}


/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */
public function update($id)
{
	$post = Post::find($id);
	//Validate input
	$input = Input::all();
	$v = Validator::make($input, Post::$edit_rules);
	if ($v->passes()) {
		$post->title = $input['title'];
		$post->privacy = $input['privacy'];
	    $post->name = Auth::user()->fullname;
	    $post->message = $input['message'];
	    $post->save(); 
		return Redirect::route('post.show', $post->id);
	} else {
		return Redirect::route('post.edit', $post->id)->withErrors($v);
	}
} 


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($id)
{
	//Find the post being deleted and delete it. Then loop through the comments
	//attached to the post and delete them
	$post = Post::find($id);
	$comments = $post->comments;
	$post->delete();
	foreach ($comments as $comment) {
		$comment->delete();
	}
	return Redirect::action('post.index');	
}//
}
