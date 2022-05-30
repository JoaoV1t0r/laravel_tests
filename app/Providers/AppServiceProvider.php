<?php

namespace App\Providers;

use App\Providers\DependencyInjection\DependencyInjection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        DependencyInjection::providers($this->app)->each(function (DependencyInjection $di): void {
            $di->configure();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
