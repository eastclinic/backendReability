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
            $table->char('file');
            $table->char('url');
            $table->text('converted_content_info')->nullable();
            $table->unsignedInteger('review_id');
            //$table->nullableMorphs('contentable');
//            $table->foreignId('review_id')
//                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreignId('message_id')
//                ->default(0)
//                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->timestamps();
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
