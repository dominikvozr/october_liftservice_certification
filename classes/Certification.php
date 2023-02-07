<?php namespace Dondo\Certification\Classes;

abstract class Certification
{
	protected static $instance;

	protected $certificationModel;

	abstract public function getCertificationById(int $product_id);

	abstract public function storeCertification($input);

	abstract public function deleteCertification($id);

	// TODO: implement pdf generation
}
