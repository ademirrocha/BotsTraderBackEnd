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

        $this->app->register(RepositoryServiceProvider::class);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class, 
            \App\Repositories\UserRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\TradeRepositoryInterface::class, 
            \App\Repositories\TradeRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\EntradaRepositoryInterface::class, 
            \App\Repositories\EntradaRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Entradas\EntradaAtivosRepositoryInterface::class, 
            \App\Repositories\Entradas\EntradaAtivosRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\Ativos\AtivoRepositoryInterface::class, 
            \App\Repositories\Ativos\AtivoRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\Dashboard\DashboardRepositoryInterface::class, 
            \App\Repositories\Dashboard\DashboardRepositoryEloquent::class
        );
        
    }
}
