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
//            $table->char('file_name')->default('');
//            $table->char('file_extension')->default('');
            $table->char('url')->default('');
            $table->char('parent_content_id')->default('');
            $table->char('type')->default('');
            $table->char('typeFile')->default('');
            $table->boolean('confirm')->default(false);
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
