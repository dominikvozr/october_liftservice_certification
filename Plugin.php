<?php namespace Dondo\Certification;

use Dondo\Certification\Handlers\EventsHandler;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Certification Settings',
                'description' => 'Manage certification based settings.',
                'category' => 'Certification',
                'icon' => 'icon-cog',
                'class' => \Dondo\Certification\Models\Config::class,
                'order' => 500,
                'keywords' => 'certification config settings',
                //'permissions' => ['acme.users.access_settings']
            ]
        ];
    }

    public function register() {
        \App::register(\Dondo\Certification\Providers\CertificationServiceProvider::class);
        \App::registerClassAlias('CertificationManager', \Dondo\Certification\Facades\CertificationManager::class);
        \App::registerClassAlias('ProfessionalInspectionProtocolManagement', \Dondo\Certification\Facades\ProfessionalInspectionProtocolManagement::class);
        \App::registerClassAlias('ProfessionalReviewProtocolManagement', \Dondo\Certification\Facades\ProfessionalReviewProtocolManagement::class);

        \App::register(\Barryvdh\DomPDF\ServiceProvider::class);
        \App::registerClassAlias('PDF', \Barryvdh\DomPDF\Facade::class);
    }

    public function boot() {
        \Config::set('dompdf', \Config::get('dondo.certification::dompdf'));
        Event::listen('professionalReviewProtocol.created', [EventsHandler::class, 'onProfessionalReviewProtocolCreated']);
    }

    public function registerPDFTemplates()
    {
        return [
            'dondo.certification::pdf.CertificationExpertInspection',
        ];
    }
}
