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
		$this->bindFacades();
	}

	/**
	 * Bind repositories.
	 *
	 * @return  void
	 */
	protected function bindRepositories() {
		$this->app->singleton( 'Giffy\Repositories\GifRepositoryInterface', 'Giffy\Repositories\DbGifRepository' );
		$this->app->singleton( 'Giffy\Repositories\TagRepositoryInterface', 'Giffy\Repositories\DbTagRepository' );

	}

	/**
	 * Bind facades.
	 *
	 * @return  void
	 */
	protected function bindFacades() {
		$this->app->bind( 'Giffy', function() {
				return new \Giffy\Facades\Giffy();
			} );
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
