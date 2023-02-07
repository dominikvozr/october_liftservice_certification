<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationProfessionalInspectionProtocol2 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_professional_inspection_protocol', function($table)
        {
            $table->text('records_elevator_technician');
            $table->text('inspection_result');
            $table->string('signature');
            $table->renameColumn('otazka', 'operator');
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_professional_inspection_protocol', function($table)
        {
            $table->dropColumn('records_elevator_technician');
            $table->dropColumn('inspection_result');
            $table->dropColumn('signature');
            $table->renameColumn('operator', 'otazka');
        });
    }
}
