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
            $table->uuid('id')->primary();
            $table->char('file')->default('');
            $table->char('file_name')->default('');
            $table->char('file_extension')->default('');
            $table->char('url')->default('');
            $table->boolean('preview')->default(false);
            $table->text('converted_content_info')->default('');
            $table->unsignedInteger('review_id');
            $table->unsignedInteger('message_id')->default(0);
            //$table->nullableMorphs('contentable');
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
