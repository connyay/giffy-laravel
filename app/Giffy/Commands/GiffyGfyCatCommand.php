<?php namespace Giffy\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Giffy\Models\Gif;

class GiffyGfyCatCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'giffy:gfycat';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Builds Gfycat links from image urls.';

	protected $runCount = 0;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire() {
		$count = 0;
		$gifs = Gif::orderBy('id', 'DESC')->where( 'gfy_id', '=', NULL )->take( 10 )->get();
        foreach ( $gifs as $gif ) {
        	$count++;
        	$transaction_id = str_pad( $count, 3, "0", STR_PAD_LEFT );
            $url = $gif->url;
            $response = (array) json_decode( file_get_contents( 'http://upload.gfycat.com/transcode/GiffyCo'.$transaction_id.'?fetchUrl='.$url ), true );
            $gfyName = $response['gfyName'];
            if ( !is_null( $gfyName ) && !empty( $gfyName ) ) {
                $response = (array) json_decode( file_get_contents( 'http://gfycat.com/ajax/publish/'.$gfyName ), true );
                $gifSize = $response['gifSize'];
                if ( !is_null( $gifSize ) && !empty( $gifSize ) ) {
                    $gif->gfy_id = $gfyName;
                    $gif->save();
                    $this->info('Made ' . $gfyName . ' for imgur link ' . $url);
                    $this->info('Sleeping for 10');
                    sleep(10);
                    $this->info('Awake!');
                }
            }
        }
        if($this->runCount == 0) {
        	$this->info('Made some GfyLinks...');
        	$this->runCount++;
        	$this->fire();
    	} else {
    		$this->info('Made a lot of GfyLinks...');
    	}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions() {
		return array();
	}

}
