<?php

namespace App\Providers;

use App\Models\User;
use App\Models\GetHelp;
use App\Models\ProvideHelp;
use App\Observers\UserObserver;
use App\Observers\GetHelpObserver;
use App\Observers\ProvideHelpObserver;
use Illuminate\Support\Facades\Schema;
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
        ProvideHelp::observe(ProvideHelpObserver::class);
        GetHelp::observe(GetHelpObserver::class);
        Schema::defaultStringLength(191);
    }
}
