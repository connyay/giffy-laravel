<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

            $users = array(
                array(
                    'username' => 'admin',
                    'password' => Hash::make('123456'),
                    'super_user' => true,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'username' => 'user',
                    'password' => Hash::make('123456'),
                    'super_user' => false,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
            );

        DB::table('users')->insert($users);
    }

}
