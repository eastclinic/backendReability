<?php

namespace Modules\Reviews\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Observers\ReviewObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Log::info('EventServiceProvider register()!');
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        Log::info('EventServiceProvider provides()!');
        return [
            //Review::class => [ReviewObserver::class],
        ];
    }
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }

    protected $observers = [
        Review::class => [ReviewObserver::class],
    ];
}
