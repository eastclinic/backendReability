<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        define('DB_CONNECTION_DEFAULT', config('database.default'));
        define('DB_CONNECTION_MODX', config('database.MODX'));
        // Add more constants here
    }

    public function register()
    {
        //
    }
}
