<?php

namespace Modules\Doctors\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Doctors\Entities\Doctor;


class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('reviews')->truncate();
        DB::table('review_messages')->truncate();
        DB::table('reviews_content')->truncate();


        Schema::enableForeignKeyConstraints();


        Doctor::factory(20)->create();
    }
}
