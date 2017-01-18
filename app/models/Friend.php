<?php

class Friend extends Eloquent {
    function user()
    {
        Eloquent::unguard();
        return $this->belongsTo('User');
    }
}