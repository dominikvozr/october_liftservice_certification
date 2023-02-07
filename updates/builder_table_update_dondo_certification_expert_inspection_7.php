<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection7 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->dropColumn('records_elevator_technician');
            $table->dropColumn('inspection_result');
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->text('records_elevator_technician');
            $table->text('inspection_result');
        });
    }
}
