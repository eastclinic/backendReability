<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Health\Entities\Doctor as HealthDoctor ;
use Modules\Doctors\Entities\Doctor;
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

        $doctorsIds = Doctor::pluck('id')->all();
        Log::info(print_r($doctorsIds,1));
        if($doctorsIds)     $this->healthDoctorsSeed($doctorsIds);
        $doctors = HealthDoctor::inRandomOrder()->take(10)->get();


        if($doctors){
            //        // Attach variations to doctors
            foreach ($doctors as $doctor) {
                $variationsToAdd = $variations->random(5);
                $doctor->variations()->attach($variationsToAdd);
            }
        }


        $services = Service::inRandomOrder()->take(10)->get();


        if($services){
            //        // Attach variations to doctors
            foreach ($services as $service) {
                $variationsToAdd = $variations->random(5);
                $service->variations()->attach($variationsToAdd);
            }
        }



    }

    protected function healthDoctorsSeed($doctorsIds){
        foreach ($doctorsIds as $doctorId) {
            HealthDoctor::create(['doctor_id' => $doctorId]);
        }
    }
}
