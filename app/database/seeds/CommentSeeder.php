<?php

class CommentSeeder extends Seeder {
    function run() {
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'First comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Second comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Third comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Fourth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Fifth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Sixth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Seventh comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Eighth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Ninth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'John';
        $comment->message = 'Tenth comment';
        $post = Post::find(4);
        $comment->user_id = 2;
        $post->comments()->save($comment);
    }
}