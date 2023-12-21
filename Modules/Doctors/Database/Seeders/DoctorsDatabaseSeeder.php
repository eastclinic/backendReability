<?php

namespace Modules\Doctors\Database\Seeders;

use Modules\Doctors\Entities\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;



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

        DB::table('modx_doc_doctors')->truncate();


        Schema::enableForeignKeyConstraints();


        Doctor::factory(20)->create();
        config(['database.default' => 'sqlite']);
    }
}
