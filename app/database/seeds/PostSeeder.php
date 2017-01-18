<?php

class PostSeeder extends Seeder {
    function run() {
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 1";
        $post->message = "Bob's public post";
        $post->privacy = "public";
        $post->commentsAmount = 0;
        $post->user_id = 1;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 2";
        $post->message = "Bob's friends post";
        $post->privacy = "friends";
        $post->commentsAmount = 0;
        $post->user_id = 1;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 3";
        $post->message = "Bob's private post";
        $post->privacy = "private";
        $post->commentsAmount = 0;
        $post->user_id = 1;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 1";
        $post->message = "Hey, this has 10 comments";
        $post->privacy = "friends";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 2";
        $post->message = "Hi";
        $post->privacy = "public";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 3";
        $post->message = "Hello";
        $post->privacy = "private";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 4";
        $post->message = "Good morning";
        $post->privacy = "friends";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 5";
        $post->message = "Good afternoon";
        $post->privacy = "public";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 6";
        $post->message = "More posts..";
        $post->privacy = "friends";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 7";
        $post->message = "I post a lot";
        $post->privacy = "private";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 8";
        $post->message = "Lol";
        $post->privacy = "public";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 9";
        $post->message = "Yeah";
        $post->privacy = "friends";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'John';
        $post->title = "John's post 10";
        $post->message = "Bye";
        $post->privacy = "private";
        $post->commentsAmount = 0;
        $post->user_id = 2;
        $post->save();
    }
}