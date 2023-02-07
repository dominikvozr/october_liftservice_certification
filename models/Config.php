<?php namespace Dondo\Certification\Models;
use Model;

class Config extends Model
{
    /**
     * @var array implement these behaviors
     */
    public $implement = [
        \System\Behaviors\SettingsModel::class
    ];

    /**
     * @var string settingsCode unique to this model
     */
    public $settingsCode = 'certification_settings';

    /**
     * @var string settingsFields configuration
     */
    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'signImage' => ['System\Models\File', 'public' => false]
    ];
}
