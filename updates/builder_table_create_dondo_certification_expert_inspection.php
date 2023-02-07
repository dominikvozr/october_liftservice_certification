<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoCertificationExpertInspection extends Migration
{
    public function up()
    {
        Schema::create('dondo_certification_expert_inspection', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->text('defects');
            $table->boolean('possibility_of_operation');
            $table->boolean('load_capacity_reduced');
            $table->double('load_capacity_reduced_to', 10, 0);
            $table->boolean('allowed_to_use');
            $table->date('allowed_to_use_til_date');
            $table->string('points_of_issues_professional_repair');
            $table->string('signature');
            $table->text('records_elevator_technician');
            $table->text('inspection_result');
            $table->string('operator');
            $table->string('points_of_issues');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dondo_certification_expert_inspection');
    }
}
