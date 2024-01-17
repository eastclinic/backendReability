<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected $connection = DB_CONNECTION_MODX;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modx_doc_doctors', function (Blueprint $table) {
            $table->char('yawizard_url')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modx_doc_doctors', function (Blueprint $table) {
            $table->dropColumn('yawizard_url');
        });
    }
};
