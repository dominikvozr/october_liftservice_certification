<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationConfigs3 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_configs', function($table)
        {
            $table->string('service_organization_ec')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_configs', function($table)
        {
            $table->dropColumn('service_organization_ec');
        });
    }
}
