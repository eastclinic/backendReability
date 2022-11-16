<?php

namespace Modules\Reviews\Database\Seeders;

use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewMessage;
use Modules\Reviews\Entities\ReviewContent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReviewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        //DB::table('reviews')->truncate();
        DB::table('review_messages')->truncate();
        //DB::table('reviews_content')->truncate();


        Schema::enableForeignKeyConstraints();


        Review::factory(20)->create();
        ReviewMessage::factory(10)->create();
        ReviewMessage::factory(10)->create();
        ReviewContent::factory(6)->create();
    }
}
