<?php namespace Dondo\Certification\Models;

use Model;

/**
 * Model
 */
class CertificationProfessionalInspectionProtocol extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_certification_professional_inspection_protocol';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'product' => [Product::class],
    ];

    public $fillable = [
        'product_id',
        'operator',
        'expiration_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'records_elevator_technician',
        'inspection_result',
        'signature',
    ];
}
