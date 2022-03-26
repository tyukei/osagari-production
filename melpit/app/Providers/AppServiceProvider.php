<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Payjp\Payjp;

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
        Payjp::setApiKey(config('payjp.secret_key'));
    }
}
