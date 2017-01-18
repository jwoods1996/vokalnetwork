<?php

class Comment extends Eloquent {
    protected $fillable = ['name', 'title', 'message'];
    public static $rules = array('message' => 'required'); 
    function post()
    {
        Eloquent::unguard();
        return $this->belongsTo('Post');
    }
    function user()
    {
        Eloquent::unguard();
        return $this->belongsTo('User');
    }
}