<?php

namespace App\Providers;

use App\Events\UserSaved;
use App\Listeners\SaveUserInformation;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        UserSaved::class => [
            SaveUserInformation::class,
        ],
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
