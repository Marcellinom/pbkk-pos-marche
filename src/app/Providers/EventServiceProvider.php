<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

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
     * @return string[]
     */
    protected function discoverEventsWithin()
    {
        $discovered_directories = [];
        foreach (scandir($path = app_path('Modules')) as $dir) {
            if (file_exists($folder_path = "{$path}/{$dir}/Core/Application/EventListener")) {
                $discovered_directories[] = $folder_path;
            }
        }

        return array_merge(parent::discoverEventsWithin(), $discovered_directories);
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
}
