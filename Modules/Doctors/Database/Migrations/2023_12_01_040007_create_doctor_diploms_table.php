<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    protected $connection = DB_CONNECTION_DEFAULT;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('doctor_diploms');
        Schema::create('doctor_diploms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->boolean('published')->default(false);
            $table->unsignedBigInteger('doctor_id');
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
