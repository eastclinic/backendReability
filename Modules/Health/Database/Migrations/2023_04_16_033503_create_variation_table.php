<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_variations', function (Blueprint $table) {
            $table->id();
            $table->char('name');
            //$table->unsignedBigInteger('iservice_id')->default(0);
            $table->foreignId('iservice_id')->references('id')->on('health_iservices');
            $table->foreignId('service_id')->references('id')->on('health_services');
            $table->char( 'skill' )->default('');
            $table->char( 'option' )->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('health_variations');
        Schema::enableForeignKeyConstraints();
    }
};
