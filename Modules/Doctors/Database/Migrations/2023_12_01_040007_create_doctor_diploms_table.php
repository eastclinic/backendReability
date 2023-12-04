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
        Schema::create('doctor_diploms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->boolean('published')->default(false);
            $table->foreignId('doctor_id')
                ->references('id')->on('modx_doc_doctors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('doctor_diploms');
    }
};
