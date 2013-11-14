<?php namespace Giffy;

use Illuminate\Support\ServiceProvider;
use Config;

class GiffyServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->bindRepositories();
	}

	/**
	 * Bind repositories.
	 *
	 * @return  void
	 */
	protected function bindRepositories() {
		$this->app->singleton( 'Giffy\Repositories\GifRepositoryInterface', 'Giffy\Repositories\DbGifRepository' );

	}

	public function register() {}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}
