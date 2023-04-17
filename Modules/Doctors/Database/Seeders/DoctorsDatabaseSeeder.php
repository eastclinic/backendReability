<?php

namespace Modules\Doctors\Database\Seeders;

use Illuminate\Support\Facades\Log;
use Modules\Doctors\Entities\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Doctors\Events\DoctorEvent;


class DoctorsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        config(['database.default' => 'MODX']);
        Schema::disableForeignKeyConstraints();
        $doctors = Doctor::all();
        event(new DoctorEvent(Doctor::all(), 'deletingMass'));
        DB::table('modx_doc_doctors')->truncate();
//        $doctors = Doctor::all();
//        if($doctors){
//            foreach ($doctors as $doctor){
//                //Log::info(print_r($doctors, 1));
//                $doctor->delete();
//            }
//        }

        Schema::enableForeignKeyConstraints();


        $doctors = Doctor::factory(2)->create();
        event(new DoctorEvent($doctors, 'createdMass'));
        config(['database.default' => 'sqlite']);
    }
}
