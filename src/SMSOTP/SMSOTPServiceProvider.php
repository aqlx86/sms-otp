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
            __DIR__.'/Config/smsotp.php' => config_path('smsotp.php'),
            __DIR__.'/Migrations' => database_path('migrations'),
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
