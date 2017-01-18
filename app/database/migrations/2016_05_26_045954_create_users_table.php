<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
 			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password')->index();
			$table->string('fullname');
			$table->DateTime('dob');
 			$table->string('remember_token')->nullable();
 			$table->timestamps();
		});
		Schema::create('friends', function($table) {
 			$table->increments('id');
			$table->integer('user_id');
			$table->integer('friend_id');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
      		$table->foreign('friend_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::drop('users');
	//	Schema::drop('friends');
	}

}
