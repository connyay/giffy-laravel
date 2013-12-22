<?php namespace Giffy\Facades;

use Illuminate\Support\Facades\Facade;

class GiffyFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'Giffy'; }

}
