<?php namespace Dondo\Certification\Models;

use Model;

/**
 * Model
 */
class CertificationExpertInspectionShaftPlatform extends Model
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
    public $table = 'dondo_certification_expert_inspection_shaft_platform';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'certification' => [CertificationExpertInspection::class]
    ];

    public $fillable = [
        'expert_inspection_id',
        'enclosure',
        'cabin_guides',
        'guide_pulleys',
        'carriers',
        'balancing_devices',
        'balancing_weight',
        'bumpers',
        'bottom_shaft',
        'speed_limiter',
        'end_switch_control',
        'shaft_door',
        'door_locks',
        'control_switches',
        'security_switches_control',
        'driver_combinations',
        'electrical_installation',
        'signalization',
        'lighting',
        'tables_labels_instructions',
    ];
}
