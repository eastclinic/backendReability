<?php

namespace Modules\Health\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Health\Entities\Iservice;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;

class HealthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        DB::table('health_services')->truncate();


        Schema::enableForeignKeyConstraints();

        Iservice::factory(250)->create();
        Variation::factory(250)->create();
        Service::factory(50)->create();

    }
}
