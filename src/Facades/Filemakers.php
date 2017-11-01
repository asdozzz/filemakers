<?php
namespace Asdozzz\Filemakers\Facades;

use Illuminate\Support\Facades\Facade;

class Filemakers extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'filemakers';
	}
}