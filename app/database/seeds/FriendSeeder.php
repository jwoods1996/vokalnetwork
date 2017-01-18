<?php

class FriendSeeder extends Seeder {
    function run() {
        $friend = new Friend;
        $friend->user_id = 1;
        $friend->friend_id = 2;
        $user = User::find(1);
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = 2;
        $friend->friend_id = 1;
        $user = User::find(1);
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = 1;
        $friend->friend_id = 4;
        $user = User::find(1);
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = 4;
        $friend->friend_id = 1;
        $user = User::find(1);
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = 1;
        $friend->friend_id = 5;
        $user = User::find(1);
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = 5;
        $friend->friend_id = 1;
        $user = User::find(1);
        $friend->save();
        
    }
}