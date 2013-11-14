<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'connor',
			'password' => Hash::make('123456'),
			'userhash' => Hash::make('connor123456')
		));

		User::create(array(
			'username' => 'jessie',
			'password' => Hash::make('123456'),
			'userhash' => Hash::make('jessie123456')
		));
	}

}