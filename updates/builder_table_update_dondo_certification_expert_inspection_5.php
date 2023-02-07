<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection5 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->date('deadline_points_remove')->nullable();
            $table->boolean('out_of_service')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->dropColumn('deadline_points_remove');
            $table->dropColumn('out_of_service');
        });
    }
}
