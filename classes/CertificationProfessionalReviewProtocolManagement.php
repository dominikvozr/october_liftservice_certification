<?php namespace Dondo\Certification\Classes;

use Dondo\Certification\Models\CertificationExpertInspection;
use Dondo\Certification\Models\CertificationExpertInspectionCabin;
use Dondo\Certification\Models\CertificationExpertInspectionEngine;
use Dondo\Certification\Models\CertificationExpertInspectionShaftPlatform;
use Dondo\Certification\Models\Config;
use RainLab\User\Facades\Auth;

class CertificationProfessionalReviewProtocolManagement
{
	protected static $instance;

	protected $certificationModel = 'RainLab\User\Models\CertificationExpertInspection';

	public function getCertificationById(int $product_id)
	{
		return CertificationExpertInspection::find($product_id)
			->with('qrcode');
	}

	public function storeProfessionalReviewProtocol($input)
	{
		$cei = new CertificationExpertInspection();
		$cei->product_id = $input['product']['id'];
		$cei->defects = $input['defects'];
		$cei->user_id = Auth::id();
		$cei->possibility_of_operation = $input['possibility_of_operation'];
		$cei->load_capacity_reduced = $input['load_capacity_reduced'];
		$cei->load_capacity_reduced_to = $input['load_capacity_reduced_to'];
		$cei->allowed_to_use = $input['allowed_to_use'];
		$cei->allowed_to_use_til_date = $this->formatDate($input['allowed_to_use_til_date']);
		$cei->signature = Config::instance()->signImage->path;
		$cei->service_organization_ec = Config::instance()->serviceOrganizationEc;
		$cei->operator = $input['operator'];
		$cei->deadline_points_remove = $this->formatDate($input['deadline_points_remove']);
		$cei->out_of_service = $input['out_of_service'];
		$cei->points_of_issues = $input['points_of_issues'];
		$cei->points_of_issues_professional_repair = $input['points_of_issues_professional_repair'];
		$cei->points_of_issues_repair = $input['points_of_issues_repair'];
		$cei->records_elevator_technician = $input['records_elevator_technician'];
		$cei->inspection_result = $input['inspection_result'];
		$cei->save();

		$cabin = $this->createCabin($input['cabin'], $cei->id);
		$engine = $this->createEngine($input['engine'], $cei->id);
		$shaftPlatform = $this->createShaftPlatform($input['shaftPlatform'], $cei->id);

		$cei->certification_expert_inspection_engine_id = $cabin->id;
        $cei->certification_expert_inspection_shaft_platform_id = $engine->id;
        $cei->certification_expert_inspection_cabin_id = $shaftPlatform->id;
		$cei->save();

		return $cei;
	}

	private function createCabin($input, $ceiId): CertificationExpertInspectionCabin
	{
		$cabin = new CertificationExpertInspectionCabin();

		$cabin->floor = $input['floor'];
		$cabin->walls_ceiling = $input['walls_ceiling'];
		$cabin->door = $input['door'];
		$cabin->control_door_closers = $input['control_door_closers'];
		$cabin->curtain = $input['curtain'];
		$cabin->interceptors = $input['interceptors'];
		$cabin->guide_pulleys = $input['guide_pulleys'];
		$cabin->guide_jaws = $input['guide_jaws'];
		$cabin->weighing_device = $input['weighing_device'];
		$cabin->speed_limiter = $input['speed_limiter'];
		$cabin->security_switches_control = $input['security_switches_control'];
		$cabin->driver_combination = $input['driver_combination'];
		$cabin->electrical_installation = $input['electrical_installation'];
		$cabin->revision_test_drive = $input['revision_test_drive'];
		$cabin->tables_labels_instructions = $input['tables_labels_instructions'];
		$cabin->lighting = $input['lighting'];
		$cabin->communication_device = $input['communication_device'];
		$cabin->certification_expert_inspection_id = $ceiId;
		$cabin->save();

		return $cabin;
	}

	private function createEngine($input, $ceiId): CertificationExpertInspectionEngine
	{
		$engine = new CertificationExpertInspectionEngine();

		$engine->machine = $input['machine'];
		$engine->clutch = $input['clutch'];
		$engine->electro_motor = $input['electro_motor'];
		$engine->brake = $input['brake'];
		$engine->end_switch = $input['end_switch'];
		$engine->speed_limiter = $input['speed_limiter'];
		$engine->guide_pulleys = $input['guide_pulleys'];
		$engine->main_fuse = $input['main_fuse'];
		$engine->main_switch_with_fuses = $input['main_switch_with_fuses'];
		$engine->switchboard = $input['switchboard'];
		$engine->control_device = $input['control_device'];
		$engine->security_switches_and_controls = $input['security_switches_and_controls'];
		$engine->electric_scheme = $input['electric_scheme'];
		$engine->electrical_installation = $input['electrical_installation'];
		$engine->fire_extinguisher = $input['fire_extinguisher'];
		$engine->engine_room_lighting = $input['engine_room_lighting'];
		$engine->tables_labels_instructions = $input['tables_labels_instructions'];
		$engine->access = $input['access'];
		$engine->certification_expert_inspection_id = $ceiId;
		$engine->save();

		return $engine;
	}

	private function createShaftPlatform($input, $ceiId): CertificationExpertInspectionShaftPlatform
	{
		$shaftPlatform = new CertificationExpertInspectionShaftPlatform();

		$shaftPlatform->expert_inspection_id = $ceiId;
		$shaftPlatform->enclosure = $input['enclosure'];
		$shaftPlatform->cabin_guides = $input['cabin_guides'];
		$shaftPlatform->guide_pulleys = $input['guide_pulleys'];
		$shaftPlatform->carriers = $input['carriers'];
		$shaftPlatform->balancing_devices = $input['balancing_devices'];
		$shaftPlatform->balancing_weight = $input['balancing_weight'];
		$shaftPlatform->bumpers = $input['bumpers'];
		$shaftPlatform->bottom_shaft = $input['bottom_shaft'];
		$shaftPlatform->speed_limiter = $input['speed_limiter'];
		$shaftPlatform->end_switch_control = $input['end_switch_control'];
		$shaftPlatform->shaft_door = $input['shaft_door'];
		$shaftPlatform->door_locks = $input['door_locks'];
		$shaftPlatform->control_switches = $input['control_switches'];
		$shaftPlatform->security_switches_control = $input['security_switches_control'];
		$shaftPlatform->driver_combinations = $input['driver_combinations'];
		$shaftPlatform->electrical_installation = $input['electrical_installation'];
		$shaftPlatform->signalization = $input['signalization'];
		$shaftPlatform->lighting = $input['lighting'];
		$shaftPlatform->tables_labels_instructions = $input['tables_labels_instructions'];
		$shaftPlatform->save();

		return $shaftPlatform;
	}

	public function deleteCertification($id)
	{
		return CertificationExpertInspection::destroy($id);
	}

	private function formatDate($date)
	{
		$newDate = explode('/', $date);
		return $newDate[2] . '-' . $newDate[1] . '-' . $newDate[0];
	}
}
