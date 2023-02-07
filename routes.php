<?php namespace Dondo\Certification;

use Dondo\Certification\Handlers\CertificationHandler;
use Route;

Route::group(['middleware' => 'RainLab\User\Classes\AuthMiddleware', 'prefix' => 'certification'], function () {
	Route::get('getProductById', [CertificationHandler::class, 'getCertificationById']);
	Route::post('professionalReviewProtocol/create', [CertificationHandler::class, 'storeProfessionalReviewProtocol']);
	Route::post('config', [CertificationHandler::class, 'getConfig']);
	Route::post('certificationProfessionalInspectionProtocol/create', [CertificationHandler::class, 'storeCertificationProfessionalInspectionProtocol']);
	Route::put('download/{type}/{id}', [CertificationHandler::class, 'createPdf']);
	Route::delete('delete', [CertificationHandler::class, 'deleteCertification']);
});
