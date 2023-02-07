<?php namespace Dondo\Certification\Models;

use Dondo\SystemManagement\Models\Product;
use Model;

/**
 * Model
 */
class CertificationExpertInspection extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_certification_expert_inspection';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasOne = [
        'cabin' => [CertificationExpertInspectionCabin::class],
        'engine' => [CertificationExpertInspectionEngine::class],
        'shaftPlatform' => [CertificationExpertInspectionShaftPlatform::class, 'key' => 'expert_inspection_id'],
    ];

    public $belongsTo = [
        'product' => [Product::class],
    ];

    public $fillable = [
        'product_id',
        'points_of_issues',
        'expiration_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'defects',
        'user_id',
        'possibility_of_operation',
        'load_capacity_reduced',
        'load_capacity_reduced_to',
        'allowed_to_use',
        'allowed_to_use_til_date',
        'points_of_issues_professional_repair',
        'signature',
        'operator',
        'certification_expert_inspection_engine_id',
        'certification_expert_inspection_shaft_platform_id',
        'certification_expert_inspection_cabin_id',
        'deadline_points_remove',
        'out_of_service',
        'points_of_issues_repair',
        'service_organization_ec',
        'records_elevator_technician',
        'inspection_result'
    ];
}
