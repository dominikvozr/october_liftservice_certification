<?php namespace Dondo\Certification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoCertificationExpertInspection9 extends Migration
{
    public function up()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->date('expiration_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('dondo_certification_expert_inspection', function($table)
        {
            $table->dropColumn('expiration_at');
        });
    }
}
