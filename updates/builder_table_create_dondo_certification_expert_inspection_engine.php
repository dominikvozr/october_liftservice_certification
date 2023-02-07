<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoCertificationExpertInspectionEngine extends Migration
{
    public function up()
    {
        Schema::create('dondo_certification_expert_inspection_engine', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('machine');
            $table->boolean('clutch');
            $table->boolean('electro_motor');
            $table->boolean('brake');
            $table->boolean('end_switch');
            $table->boolean('speed_limiter');
            $table->boolean('guide_pulleys');
            $table->boolean('main_fuse');
            $table->boolean('main_switch_with_fuses');
            $table->boolean('switchboard');
            $table->boolean('control_device');
            $table->boolean('security_switches_and_controls');
            $table->boolean('electric_scheme');
            $table->boolean('electrical_installation');
            $table->boolean('fire_extinguisher');
            $table->boolean('engine_room_lighting');
            $table->boolean('tables_labels_instructions');
            $table->boolean('access');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dondo_certification_expert_inspection_engine');
    }
}
