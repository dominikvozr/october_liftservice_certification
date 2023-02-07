<?php namespace Dondo\Certification\Facades;

use Illuminate\Support\Facades\Facade;

class CertificationManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'professional_inspection_protocol_management';
	}
}
