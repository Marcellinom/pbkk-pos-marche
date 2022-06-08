<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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

        $cache_file = base_path('bootstrap/cache/module-dependencies.php');
        if (file_exists($cache_file)) {
            require $cache_file;
            return;
        }

        foreach (scandir($path = app_path('Modules')) as $dir) {
            if (file_exists($filepath = "{$path}/{$dir}/dependencies.php")) {
                require $filepath;
            }
        }
    }
}
