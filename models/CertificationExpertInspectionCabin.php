<?php namespace Dondo\Certification\Models;

use Model;

/**
 * Model
 */
class CertificationExpertInspectionCabin extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_certification_expert_inspection_cabin';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'certification' => [CertificationExpertInspection::class]
    ];

    public $fillable = [
        'floor',
        'walls_ceiling',
        'door',
        'control_door_closers',
        'curtain',
        'interceptors',
        'guide_pulleys',
        'guide_jaws',
        'weighing_device',
        'speed_limiter',
        'security_switches_control',
        'driver_combination',
        'electrical_installation',
        'revision_test_drive',
        'tables_labels_instructions',
        'lighting',
        'communication_device',
        'certification_expert_inspection_id',
    ];
}
