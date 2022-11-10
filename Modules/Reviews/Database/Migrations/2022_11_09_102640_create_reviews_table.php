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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->char('author')->default('');
            $table->unsignedInteger('author_id')->default(0);
            $table->text('author_info')->default('');
            $table->float('rating')->default(0);
            $table->text('text')->default('');


            $table->char('confirm')->nullable(); //можно использовать номер договора или к примеру фото
            $table->unsignedTinyInteger('confirm_type')->nullable();
            $table->char('contact')->default('');

            $table->timestamp('published_at')->nullable();;
            $table->unsignedTinyInteger('published')->default(0);
            $table->unsignedTinyInteger('is_new')->default(0);

//            $table->unsignedInteger('seo_page_id')->nullable();
//            $table->unsignedInteger('seo_page_type')->nullable();

//            $table->unsignedInteger('doctor_review_id')->nullable();


            $table->nullableMorphs('reviewable');



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
        Schema::dropIfExists('reviews');
    }
};
