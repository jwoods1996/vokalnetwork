<?php

class FriendController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    //Validate the input
 		$input = Input::all();
        $v = Validator::make($input, User::$searchrules);
 		if ($v->passes()) {
			$searchTerm = Input::get('searchTerm');
  			$allusers = User::all();
  			$users = [];
 			$resultCount = 0;
 			//Check all the users, if they match with the search query, and add 1 to the results count.
 			foreach ($allusers as $user) {
 			    //If user's name or email matches the query
 			    if ((stripos($user['email'], $searchTerm) !== FALSE) OR stripos($user['fullname'], $searchTerm) !== FALSE) {
 			        //Add one to the count and store the user
 			        $resultCount += 1;
 			        $users[] = $user;
 			    }
 			}
			return View::make('friend.index')->withUsers($users)->with('searchTerm', $searchTerm)->with('resultCount', $resultCount);
        } else {
        	return Redirect::route('post.index')->withErrors($v);
        }
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
		//Retrieve the user id and friend id from the url
        $user_id = $_GET['user_id'];
        $friend_id = $_GET['friend_id'];
        
        //Retrieve the User object of the friend, for redirect purposes
        $person = User::where("id", $friend_id)->first();
        
        //Create 2 new friendships, one for each direction
        $friend = new Friend;
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $friend_id;
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = $friend_id;
        $friend->friend_id = Auth::user()->id;
        $friend->save();
        
        //Refresh the page
        return Redirect::action('user.show', $person->email);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$user = User::where('id', $id)->first();
		$user_id = $user->id;
		$friends = $user->friends;
		$dob = new DateTime($user->dob);
        $dob->format('Y-m-d');
        $datenow = new DateTime();
        $datenow->format('Y-m-d');
        $age = $dob->diff($datenow)->y;
		$posts = Post::orderBy('updated_at', 'DESC')->where("user_id", $user->id)->get();		
		return View::make('friend.show', compact('user', 'friends', 'age'));
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
		//$friend = Friend::where("id", $id);
        $friend_id = $_GET['friend_id'];
        $user_id = $_GET['user_id'];
		$friendship1 = Friend::where("friend_id", $friend_id)->where("user_id", $user_id);
		$friendship2 = Friend::where("friend_id", $user_id)->where("user_id", $friend_id);
		$person = User::where("id", $friend_id)->first();
		$friendship1->delete();
		$friendship2->delete();
        return Redirect::action('user.show', $person->email);
	}


}
