<?php

namespace Dondo\Certification\Handlers;

use Dondo\Certification\Facades\CertificationManager;
use Dondo\Certification\Facades\ProfessionalReviewProtocolManagement;
use Event;
use Illuminate\Routing\Controller;
use RainLab\User\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class CertificationHandler extends Controller
{
	public function getCertificationById(Request $request)
	{
		if (!Auth::check()) return response(status: 403);

		$qrcode_id = $request->query('qrcode_id');

		$certificate = CertificationManager::getProductByQrcodeId($qrcode_id);

		return response()->json(['certificate' => $certificate]);
	}

	/* public function getConfig(Request $request) {
		if (!Auth::check()) return response(status: 403);

		$product = Config::storeCertificationProfessionalInspectionProtocol($request->all());

		return response()->json(['product' => $product]);
	} */

	public function storeCertificationProfessionalInspectionProtocol(Request $request)
	{
		if (!Auth::check()) return response(status: 403);

		$product = CertificationManager::storeCertificationProfessionalInspectionProtocol($request->all());

		return response()->json(['product' => $product]);
	}

	public function storeProfessionalReviewProtocol(Request $request)
	{
		if (!Auth::check()) return response(status: 403);

		$certificate = ProfessionalReviewProtocolManagement::storeProfessionalReviewProtocol($request->all());
		Event::fire('professionalReviewProtocol.created', ['certificate' => $certificate, 'user' => Auth::getUser()]);

		return response()->json(['certificate' => $certificate]);
	}


	public function deleteCertification(Request $request)
	{
		if (!Auth::check()) return response(status: 403);

		$product = CertificationManager::deleteProduct($request->id);

		return response()->json('success');
	}
}
