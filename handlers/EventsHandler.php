<?php namespace Dondo\Certification\Handlers;

use Renatio\DynamicPDF\Classes\PDF;
use Carbon\Carbon;
use Dondo\Certification\Models\CertificationExpertInspection;
use Dondo\Certification\Models\Config;
use Illuminate\Routing\Controller;
use Log;
use October\Rain\Network\Http;
use RainLab\User\Models\User;

class EventsHandler extends Controller
{
	public function onProfessionalReviewProtocolCreated(CertificationExpertInspection $certificate, User $user)
	{
		$config = Config::instance();
		$image_path = storage_path('app/uploads/protected/63a/e26/5a3/63ae265a3955d179230271.png');
		//$image_content = Http::get($config->signImage->path);

		// $image = "data:image/png;base64, " . base64_encode($image_content);
		$image = "data:image/png;base64," . base64_encode(file_get_contents($image_path));

		$data = [
			'certificate' => $certificate,
			'user' => $user,
			'config' => $config,
			'sign' => $image,
		];

		$contxt = stream_context_create([
			'ssl' => [
				'verify_peer' => FALSE,
				'verify_peer_name' => FALSE,
				'allow_self_signed'=> TRUE
			]
		]);

		$mytime = Carbon::now();
		$pdf = PDF::setOptions([
			'dpi' => 300,
			'isHtml5ParserEnabled' => true,
			'isRemoteEnabled' => true,
			'isFontSubsettingEnabled' => true
		]);
		$pdf->getDomPDF()->setHttpContext($contxt);
		$pdf->loadTemplate('dondo.certification::pdf.CertificationExpertInspection', $data)
			->save('storage/app/media/certification/protokol_o_odbornej_prehliadke_vytahu_' . $certificate->id .'_' . $mytime->toDateString() . '.pdf')
			->stream();
		return redirect('storage/app/media/certification/protokol_o_odbornej_prehliadke_vytahu_' . $certificate->id . '_' . $mytime->toDateString() . '.pdf');
	}

}