<?php namespace Dondo\Certification\Providers;

use Dondo\Certification\Classes\CertificationProfessionalReviewProtocolManagement;
use Dondo\Certification\Classes\CertificationProfessionalInspectionProtocolManagement;
use October\Rain\Support\ServiceProvider;

class CertificationServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton('professional_review_protocol_management', fn ($app) => new CertificationProfessionalReviewProtocolManagement());
		$this->app->singleton('professional_inspection_protocol_management', fn ($app) => new CertificationProfessionalInspectionProtocolManagement());
	}
}
