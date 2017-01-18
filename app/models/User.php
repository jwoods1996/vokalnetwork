<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, StaplerableInterface {

	use UserTrait, RemindableTrait, EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    public static $rules = array('email' => 'required|unique:users', 'password' => 'required', 'firstName' => 'required', 'lastName' => 'required', 'dob' => 'required');    
    public static $searchrules = array('searchTerm' => 'required');    
    public static $loginrules = array('email' => 'required', 'password' => 'required');    
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    function posts()
    {
        Eloquent::unguard();
        return $this->hasMany('Post');
    }
    function friends()
    {
        Eloquent::unguard();
        return $this->hasMany('Friend');
    }
    //function friends()
    //{
    //    Eloquent::unguard();
    //    return $this->hasMany('Friend');
    //}
    public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('image', [
    'styles' => [
    'medium' => '300x300',
    'thumb' => '100x100'
    ]
    ]);
    parent::__construct($attributes);
    }
}
