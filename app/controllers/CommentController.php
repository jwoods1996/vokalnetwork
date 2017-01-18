<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Retrieve the user id and post id from the url
		$userid = $_GET['userid'];
		$postid = $_GET['postid'];
		//Find the user making the comment and the post being commented on
		$user = User::where("id", $userid)->first();
		$post = Post::find($postid);
		$comment = new Comment;
		$input = Input::all();
		//Validate the input
		$v = Validator::make($input, Comment::$rules);
		if ($v->passes()) {
			//Set the values of the comment columns
		    $comment->name = Auth::user()->fullname;
		    $comment->message = $input['message'];
		    //Associate the comment with the post it belongs to, and the user who wrote it
		    $comment->post()->associate($post);
		    $comment->user()->associate($user);
			$comment->save();
			return Redirect::action('post.show', $postid);
		} else {
			return Redirect::action('post.show')->withErrors($v);
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
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		//Find the comment and delete it
		$comment = Comment::find($id);
		$comment->delete();
		//Return to the previous page.
		return Redirect::back();	
	}


}
