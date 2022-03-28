<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
    }
}
