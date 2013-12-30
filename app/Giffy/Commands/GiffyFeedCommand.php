<?php namespace Giffy\Commands;

use Illuminate\Console\Command;

use Cache;
use Giffy\Models\Gif;
use Giffy\Repositories\GifRepositoryInterface;

class GiffyFeedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'giffy:feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads 100 gifs from /r/reactiongifs';

    /**
     * The gif repository implementation.
     *
     * @var gifs
     */
    protected $gifs;

    protected $addedCount = 0;
    protected $skippedCount = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GifRepositoryInterface $gifs)
    {
        parent::__construct();
        $this->gifs = $gifs;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->fetch();
        $this->info( 'Cleaning duplicates.' );
        $this->cleanDuplicates();
        $this->info( 'Flushing cache.' );
        Cache::tags( 'paginated-gifs' )->flush();
        $this->info( 'Giffy feed has completed.' );
        $this->info( 'Added '. $this->addedCount .' new gifs' );
        $this->info( 'Skipped '. $this->skippedCount .' gifs' );
    }

    /**
     * Cleans duplicate entries from the gif table
     */
    protected function fetch()
    {
        $array = (array) json_decode( file_get_contents( "http://www.reddit.com/r/reactiongifs/top/.json?sort=top&t=day&limit=100" ), true );
        foreach ($array['data']['children'] as $child) {
            $data = $child['data'];
            if ($data['domain'] === 'i.imgur.com') {
                $imageUrl = $data['url'];
                $exists = $this->gifs->exists( $imageUrl );
                if ($exists) {
                    $this->skippedCount++;
                    $this->error( 'We have '. $imageUrl .' already. Skipping.' );
                    continue;
                }
                $this->gifs->create( $imageUrl );
                $this->comment( 'Added '. $imageUrl );
                $this->addedCount++;
            }
        }
    }

    /**
     * Cleans duplicate entries from the gif table
     */
    protected function cleanDuplicates()
    {
        $this->gifs->cleanDuplicates();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}
