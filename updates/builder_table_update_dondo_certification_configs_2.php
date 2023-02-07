<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationConfigs2 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_configs', function($table)
        {
            $table->string('sign_image', 36)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_certification_configs', function($table)
        {
            $table->string('sign_image', 36)->nullable(false)->change();
        });
    }
}
