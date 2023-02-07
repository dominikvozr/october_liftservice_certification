<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationProfessionalInspectionProtocol extends Migration
{
    public function up()
    {
        Schema::rename('dondo_certification_product_two', 'dondo_certification_professional_inspection_protocol');
    }
    
    public function down()
    {
        Schema::rename('dondo_certification_professional_inspection_protocol', 'dondo_certification_product_two');
    }
}
