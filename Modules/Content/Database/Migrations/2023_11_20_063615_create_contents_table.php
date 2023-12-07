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
        Schema::create('contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('file')->default('');
//            $table->char('file_name')->default('');
//            $table->char('file_extension')->default('');
            $table->char('url')->default('');
            $table->char('preview_id')->default('');
            $table->char('parent_id')->default('');
            $table->char('type')->default('');
            $table->char('typeFile')->default('');
            $table->char('mime')->default('');
            $table->nullableMorphs('contentable');
            $table->boolean('confirm')->default(false);
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('contents');
    }
};
