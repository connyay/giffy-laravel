<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();

			$users = array(
				array(
					'username' => 'admin',
					'password' => Hash::make('123456'),
				),
				array(
					'username' => 'user',
					'password' => Hash::make('123456'),
				),
			);

		DB::table('users')->insert($users);
	}

}
