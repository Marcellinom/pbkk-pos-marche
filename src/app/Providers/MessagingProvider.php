<?php

namespace App\Providers;

class MessagingProvider extends AppServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModules();
    }

    public function bootModules(): void
    {
        $app = $this->app;

        $cache_file = base_path('bootstrap/cache/module-messaging.php');
        if (file_exists($cache_file)) {
            require $cache_file;
            return;
        }

        foreach (scandir($path = app_path('Modules')) as $dir) {
            if (file_exists($filepath = "{$path}/{$dir}/messaging.php")) {
                require $filepath;
            }
        }
    }
}
