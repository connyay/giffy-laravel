<?php

class GifsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('gifs')->truncate();
		
		$gifs = array();

		$thumbs = File::files(public_path() . '/thumbs');
        
        foreach ($thumbs as $thumb) {
        	$fileName = last(explode("/", $thumb));
        	$url = "http://i.imgur.com/" . $fileName;
        	$thumbPath = "/thumbs/" . $fileName;

        	$gifs[] = array(
					'url' => $url,
					'thumb' => $thumbPath,
					'created_at' => new DateTime,
                	'updated_at' => new DateTime,
				);
        }


		DB::table('gifs')->insert($gifs);
	}

}
