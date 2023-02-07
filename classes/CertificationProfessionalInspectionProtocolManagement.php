<?php namespace Dondo\Certification\Classes;

use Dondo\Certification\Models\CertificationProfessionalInspectionProtocol;

class CertificationProfessionalInspectionProtocolManagement extends Certification
{
	protected static $instance;

	protected $certificationModel = 'RainLab\User\Models\CertificationProfessionalInspectionProtocol';

	public function getCertificationById(int $product_id)
	{
		return CertificationProfessionalInspectionProtocol::find($product_id)
			->with('qrcode');
	}

	public function storeCertification($input)
	{
		return CertificationProfessionalInspectionProtocol::create($input);
	}

	public function deleteCertification($id)
	{
		return CertificationProfessionalInspectionProtocol::destroy($id);
	}
}