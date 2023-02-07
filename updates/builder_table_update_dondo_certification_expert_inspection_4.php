<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection4 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->integer('certification_expert_inspection_cabin_id')->unsigned();
            $table->renameColumn('shaft_platform_shaft_platform', 'certification_expert_inspection_shaft_platform_id');
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->dropColumn('certification_expert_inspection_cabin_id');
            $table->renameColumn('certification_expert_inspection_shaft_platform_id', 'shaft_platform_shaft_platform');
        });
    }
}
