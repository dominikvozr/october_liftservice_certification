<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationConfigs extends Migration
{
    public function up()
    {
        Schema::rename('dondo_certification_config', 'dondo_certification_configs');
    }
    
    public function down()
    {
        Schema::rename('dondo_certification_configs', 'dondo_certification_config');
    }
}
