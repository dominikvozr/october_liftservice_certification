<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoCertificationExpertInspectionShaftPlatform extends Migration
{
    public function up()
    {
        Schema::create('dondo_certification_expert_inspection_shaft_platform', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('expert_inspection_id')->unsigned();
            $table->boolean('enclosure');
            $table->boolean('cabin_guides');
            $table->boolean('guide_pulleys');
            $table->boolean('carriers');
            $table->boolean('balancing_devices');
            $table->boolean('balancing_weight');
            $table->boolean('bumpers');
            $table->boolean('bottom_shaft');
            $table->boolean('speed_limiter');
            $table->boolean('end_switch_control');
            $table->boolean('shaft_door');
            $table->boolean('door_locks');
            $table->boolean('control_switches');
            $table->boolean('security_switches_control');
            $table->boolean('driver_combinations');
            $table->boolean('electrical_installation');
            $table->boolean('signalization');
            $table->boolean('lighting');
            $table->boolean('tables_labels_instructions');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dondo_certification_expert_inspection_shaft_platform');
    }
}
