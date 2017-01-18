<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.index'); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create'); 
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validate input
 		$input = Input::all();
        $v = Validator::make($input, User::$rules);
 		if ($v->passes()) {
			$password = $input['password'];
			//Hash the password
 			$encrypted = Hash::make($password);
 			$user = new User;
 			$firstName = $input['firstName'];
 			$lastName = $input['lastName'];
 			//Check if the user has uploaded an image, then save it
 			if (Input::hasFile('image'))
			{
				$image = $_FILES['image'];	
 				$user->image = $image;
			}
 			$user->email = $input['email'];
			$user->password = $encrypted;
 			$user->fullName = $input['firstName'] . " " . $input['lastName'];
 			$user->dob = $input['dob'];
 			$user->save();
 			return Redirect::route('user.index'); 
        } else {
        	return Redirect::route('user.create')->withErrors($v);
        }
	}
	
	public function login()
	{
 		$input = Input::all();
        $v = Validator::make($input, User::$loginrules);
 		if ($v->passes()) {
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			if (Auth::attempt($userdata)){
				return Redirect::route('post.index');
			} else {
				 Session::put('login_error', 'Login failed');
				return Redirect::to(URL::previous())->withInput();
			}
        } else {
        	return Redirect::route('user.index')->withErrors($v);
        }		
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::action('user.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where("email", $id)->first();
		$user_id = $user->id;
		$friends = $user->friends;
		
		//Calculate age from difference between dob and now
		$dob = new DateTime($user->dob);
        $dob->format('Y-m-d');
        $datenow = new DateTime();
        $datenow->format('Y-m-d');
        $age = $dob->diff($datenow)->y;
		$posts = Post::orderBy('updated_at', 'DESC')->where("user_id", $user->id)->get();
		return View::make('user.show', compact('user', 'posts', 'age', 'friends'));
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
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function search()
	{


	}

}
