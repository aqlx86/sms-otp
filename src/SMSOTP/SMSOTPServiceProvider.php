<?php

namespace SMSOTP;

use Illuminate\Support\ServiceProvider;

class SMSOTPServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/smsotp.php' => config_path('smsotp.php'),
            __DIR__.'/migrations' => database_path('migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
