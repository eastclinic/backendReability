<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Health\Entities\Doctor as Doctor ;
use Modules\Health\Entities\Iservice;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;
use Faker\Factory as Faker;

class HealthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        DB::table('health_services')->truncate();
        DB::table('health_iservices')->truncate();
        DB::table('health_variations')->truncate();
        DB::table('health_doctors')->truncate();

        Schema::enableForeignKeyConstraints();




        Iservice::factory(20)->create();

        Service::factory(50)->create();
        // Create 20 variations
        $variations = Variation::factory()->count(20)->create();
        $doctors = Doctor::inRandomOrder()->take(10)->get();
        Log::info(print_r($doctors,1));
        if($doctors){
            //        // Attach variations to doctors
            foreach ($doctors as $doctor) {
                $variationsToAdd = $variations->random(5);
                $doctor->variations()->attach($variationsToAdd);
            }
        }



    }
}
