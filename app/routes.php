<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
//Route::get('comments/{id}', '');
//Route::get('', '');
//Route::get('feed', 'PostController@displayPosts'); 
//Route::get('comments/{id}/update', 'PostController@update_comment_amount'); 
//Route::get('comments/{id}', 'PostController@displayComments'); 
//Route::get('edit_post/{id}', 'PostController@edit_post'); 
//Route::put('update_post/{id}', 'PostController@update_post'); 
//Route::put('add_post', 'PostController@add_post'); 
//Route::get('delete_post/{id}', 'PostController@delete_post'); 
//Route::put('comments/{id}/add_comment', 'PostController@add_comment'); 
//Route::get('delete_comment/{postid}/{id}', 'PostController@delete_comment'); 
//Route::get('login', 'UserController@login');

Route::resource('comment', 'CommentController'); 
Route::resource('post', 'PostController'); 
Route::resource('friend', 'FriendController'); 
Route::resource('documentation', 'DocumentationController'); 

Route::get('user/search', array('as' => 'user.search', 'uses' => 'UserController@search'));
Route::post('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::resource('user', 'UserController'); 