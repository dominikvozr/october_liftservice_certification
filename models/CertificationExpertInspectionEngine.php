<?php namespace Dondo\Certification\Models;

use Model;

/**
 * Model
 */
class CertificationExpertInspectionEngine extends Model
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
    public $table = 'dondo_certification_expert_inspection_engine';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'certification' => [CertificationExpertInspection::class]
    ];

    public $fillable = [
        'machine',
        'clutch',
        'electro_motor',
        'brake',
        'end_switch',
        'speed_limiter',
        'guide_pulleys',
        'main_fuse',
        'main_switch_with_fuses',
        'switchboard',
        'control_device',
        'security_switches_and_controls',
        'electric_scheme',
        'electrical_installation',
        'fire_extinguisher',
        'engine_room_lighting',
        'tables_labels_instructions',
        'access',
        'certification_expert_inspection_id',
    ];
}
