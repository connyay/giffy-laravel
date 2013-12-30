<?php

class GifsTableSeeder extends Seeder
{
    public function run()
    {
        Artisan::call('giffy:feed');
    }

}
