<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) 
		{
			$table->increments('id');
			$table->string('image');
			$table->string('title');
			$table->string('name');
			$table->string('message');
			$table->string('privacy');
			$table->string('created_at');
			$table->string('updated_at');
			$table->integer('user_id');
			$table->integer('commentsAmount');
		});
		
		Schema::create('comments',
		function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('message');
			$table->integer('post_id');
			$table->integer('user_id');
			$table->string('created_at');
			$table->string('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
		Schema::drop('comments');
	}

}
