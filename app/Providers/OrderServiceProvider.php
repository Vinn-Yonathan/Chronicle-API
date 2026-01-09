<?php

namespace App\Providers;

use App\Services\impl\OrderServiceImpl;
use App\Services\OrderService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class OrderServiceProvider extends ServiceProvider
{
    function provides()
    {
        return [OrderService::class];
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        App::singleton(OrderService::class, function () {
            return new OrderServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
