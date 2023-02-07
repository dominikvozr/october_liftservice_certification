<?php namespace Dondo\Certification\Facades;

use Illuminate\Support\Facades\Facade;

class CertificationManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'certification_product';
	}
}
