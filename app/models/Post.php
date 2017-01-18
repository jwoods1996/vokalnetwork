<?php

class Post extends Eloquent {
    protected $fillable = ['image', 'name', 'title', 'privacy', 'message', 'commentsAmount'];
    public static $rules = array('title' => 'required', 'privacy' => 'required', 'message' => 'required'); 
    public static $edit_rules = array('title' => 'required', 'privacy' => 'required', 'message' => 'required'); 
    function comments()
    {
        Eloquent::unguard();
        return $this->hasMany('Comment');
    }
    function user()
    {
        Eloquent::unguard();
        return $this->belongsTo('User');
    }
}