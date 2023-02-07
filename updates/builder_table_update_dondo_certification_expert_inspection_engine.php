<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspectionEngine extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection_engine', function($table)
        {
            $table->integer('certification_expert_inspection_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection_engine', function($table)
        {
            $table->dropColumn('certification_expert_inspection_id');
        });
    }
}
