<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationProfessionalInspectionProtocol3 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_professional_inspection_protocol', function($table)
        {
            $table->string('product_id')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_professional_inspection_protocol', function($table)
        {
            $table->integer('product_id')->nullable(false)->unsigned()->default(null)->comment(null)->change();
        });
    }
}
