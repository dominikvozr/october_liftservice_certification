<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoCertificationExpertInspectionCabin extends Migration
{
    public function up()
    {
        Schema::create('dondo_certification_expert_inspection_cabin', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('floor');
            $table->boolean('walls_ceiling');
            $table->boolean('door');
            $table->boolean('control_door_closers');
            $table->boolean('curtain');
            $table->boolean('interceptors');
            $table->boolean('guide_pulleys');
            $table->boolean('guide_jaws');
            $table->boolean('weighing_device');
            $table->boolean('speed_limiter');
            $table->boolean('security_switches_control');
            $table->boolean('driver_combination');
            $table->boolean('electrical_installation');
            $table->boolean('revision_test_drive');
            $table->boolean('tables_labels_instructions');
            $table->boolean('lighting');
            $table->boolean('communication_device');
            $table->integer('certification_expert_inspection_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dondo_certification_expert_inspection_cabin');
    }
}
