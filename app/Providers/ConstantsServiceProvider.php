<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        define('DEFAULT_DB_CONNECT', config('database.default'));
        // Add more constants here
    }

    public function register()
    {
        //
    }
}
