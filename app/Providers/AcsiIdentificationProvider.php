<?php

namespace App\Providers;

use App\Http\Acsi\AcsiIdentification;
use Illuminate\Support\ServiceProvider;

class AcsiIdentificationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AcsiIdentification::class,function($app){

            return new AcsiIdentification();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
