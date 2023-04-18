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
//        config(['database.default' => 'MODX']);
        Schema::disableForeignKeyConstraints();
        //create event without model events

        //todo check completely truncate
        //todo !test
        Doctor::truncate();
//        config(['database.default' => 'sqlite']);
//        DB::table('modx_doc_doctors')->truncate();
        event((new DoctorEvent())->truncate());
        Schema::enableForeignKeyConstraints();

//        config(['database.default' => 'MODX']);
//        Doctor::factory(3)->create();
        Doctor::factory()->count(20)->create();
//        config(['database.default' => 'sqlite']);
        //event((new DoctorEvent())->createdMass($doctors));
    }
}
