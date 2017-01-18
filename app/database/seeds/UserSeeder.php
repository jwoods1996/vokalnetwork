<?php

class UserSeeder extends Seeder {
    function run() {
        $password='1234';
 		$encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Bob@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Bob';
 		$user->dob = new DateTime('6 May 1984');
 		$user->save();

        $password='1234';
 		$encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'John@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'John';
 		$user->dob = new DateTime('6 May 1984');
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Tom@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Tom';
 		$user->dob = new DateTime('6 May 1984');
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Derek@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Derek';
 		$user->dob = new DateTime('6 May 1984');
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Bill@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Bill';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Ben@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Ben';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Carl@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Carl';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Stacy@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Stacy';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Claire@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Claire';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();

        $password='1234';
        $encrypted = Hash::make($password);
 		$user = new User;
 		$user->email = 'Trisha@a.org';
		$user->password = $encrypted;
 		$user->fullName = 'Trisha';
 		$user->dob = new DateTime('6 May 1984');
 		
 		$user->save();
    }
}