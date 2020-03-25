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
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface', 
            'App\Repositories\UserRepositoryEloquent',
            'App\Repositories\TradeRepositoryInterface', 
            'App\Repositories\TradeRepositoryEloquent',
            'App\Repositories\EntradaRepositoryInterface', 
            'App\Repositories\EntradaRepositoryEloquent',
            'App\Repositories\AtivoRepositoryInterface', 
            'App\Repositories\AtivoRepositoryEloquent'
            
        );
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
