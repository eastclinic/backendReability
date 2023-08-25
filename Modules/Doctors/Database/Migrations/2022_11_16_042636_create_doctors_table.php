<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * The database connection that should be used by the migration.
     *
     * @var string
     */
//    protected $connection = 'MODX';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('modx_doc_doctors');

        Schema::create('modx_doc_doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('iid')->default(0);
            $table->integer('id_resource')->default(0);
            $table->string('uri', 191)->nullable();
            $table->string('surname', 50)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('middlename', 50)->nullable();
            $table->string('fullname', 100)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('photo_type', 60)->nullable();
            $table->json('photos')->nullable();
            $table->tinyInteger('holiday')->default(0);
            $table->integer('rating')->default(0);
            $table->float('rating5')->default(0);
            $table->integer('comments')->default(0);
            $table->tinyInteger('show_comments')->default(1);
            $table->integer('child')->default(0);
            $table->tinyInteger('pregnant')->default(0);
            $table->text('diseases')->nullable();
            $table->integer('experience')->default(0);
            $table->text('way_experience')->nullable();
            $table->tinyInteger('show_experience')->default(1);
            $table->tinyInteger('telemedicine')->default(0);
            $table->text('training')->nullable();
            $table->text('longtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('introtext')->nullable();
            $table->mediumText('content')->nullable();
            $table->integer('age_from')->default(0);
            $table->integer('age_to')->default(100);
            $table->char( 'skill' )->default('usual');
            $table->tinyInteger('is_primary_care')->nullable();
            $table->tinyInteger('is_doctor')->default(1);
            $table->tinyInteger('is_nurse')->default(0);
            $table->tinyInteger('is_analyze')->default(0);
            $table->tinyInteger('off')->default(0);
            $table->text('research')->nullable();
            $table->text('diploms')->nullable();
            $table->string('quotes', 5000)->default('');
            $table->text('interviews')->nullable();
            $table->text('awards')->nullable();
            $table->timestamps();
            $table->index('iid');
            $table->index('id_resource');
            $table->index('uri');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modx_doc_doctors');
    }
};
