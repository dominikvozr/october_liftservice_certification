<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection6 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->string('points_of_issues_repair', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->dropColumn('points_of_issues_repair');
        });
    }
}
