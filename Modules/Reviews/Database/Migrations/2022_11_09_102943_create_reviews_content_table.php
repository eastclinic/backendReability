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
        Schema::create('reviews_content', function (Blueprint $table) {
            $table->id();
            $table->char('path')->nullable();
            $table->char('upload_name')->nullable();
            $table->char('url')->nullable();
            $table->text('converted_content_info')->nullable();
            $table->nullableMorphs('contentable');
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
        Schema::dropIfExists('reviews_content');
    }
};
