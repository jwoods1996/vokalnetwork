<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('PostSeeder'); 
		$this->call('CommentSeeder'); 
		$this->call('UserSeeder'); 
		$this->call('FriendSeeder');
	}

}
