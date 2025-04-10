<?php

namespace App\Providers;
use App\Services\CarneService;
use App\Services\CarneServiceInterface;
use App\Repositories\CarneRepository;
use App\Repositories\CarneRepositoryInterface;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarneServiceInterface::class, CarneService::class);
        $this->app->bind(CarneRepositoryInterface::class, CarneRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
