<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection10 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->integer('certification_expert_inspection_engine_id')->nullable()->change();
            $table->integer('certification_expert_inspection_shaft_platform_id')->nullable()->change();
            $table->integer('certification_expert_inspection_cabin_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->integer('certification_expert_inspection_engine_id')->nullable(false)->change();
            $table->integer('certification_expert_inspection_shaft_platform_id')->nullable(false)->change();
            $table->integer('certification_expert_inspection_cabin_id')->nullable(false)->change();
        });
    }
}
