<?php namespace Giffy\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App, SSH;

class GiffyDeployCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'giffy:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy code on server.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $self = $this;
        $remote = $this->argument( 'remote' );
        $config = app()->config['remote.connections.'.$remote];

        if (App::environment() == 'production') {
            $commands = $this->getProductionCommands($config);
        } else {
            $commands = $this->getDevCommands($config);
        }

        if ( $this->option( 'migrate' ) )
            $commands[] = 'php artisan migrate';

        if ( $this->option( 'composer' ) )
            $commands[] = 'composer install --no-dev';

        SSH::into( $remote )->run(

            $commands,

            function ($line) use ($self) {
                $self->info( $line );
            }
        );

        $this->info( 'All done!' );
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array( 'remote', InputArgument::OPTIONAL, 'Define which remote to connect to.', 'production' ),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array( 'composer', null, InputOption::VALUE_NONE, 'Execute composer install.', null ),
            array( 'migrate', null, InputOption::VALUE_NONE, 'Execute php artisan migrate.', null ),
        );
    }

    /**
     * Get the production deploy commands.
     *
     * @return array
     */
    protected function getProductionCommands($config)
    {
        return [
        'cd '.$config['root'],
        'git checkout -f',
        'git pull -f',
        'composer dump-autoload',
        'php artisan cache:clear',
        ];
    }

    /**
     * Get the dev deploy commands.
     *
     * @return array
     */
    protected function getDevCommands($config)
    {
        return [
        'cd '.$config['root'],
        'php artisan migrate',
        'php artisan db:seed',
        ];
    }

}
