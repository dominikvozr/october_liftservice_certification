<?php namespace Dondo\Certification\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use System\Classes\SettingsManager;

class Config extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    /* public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dondo.Certification', 'certifications', 'Config');
    } */
    public function __construct()
    {
        parent::__construct();

        // ...

        //BackendMenu::setContext('October.System', 'system', 'settings');
        BackendMenu::setContext('Dondo.Certification', 'certifications', 'Config');
        SettingsManager::setContext('Dondo.Certification', 'config');
    }

    public function formBeforeSave($model)
    {
        // When locale dropdown is set to "custom", override with the _custom_locale text field
        //if (post('MyModel[sign_image]') === 'custom') {
            //$this->formSetSaveValue('sign_image', post('MyModel[sign_image]'));
        //}
    }
}
