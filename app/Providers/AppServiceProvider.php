<?php

namespace App\Providers;

use App\Repositories\Providers\ProviderRepository;
use App\Repositories\Providers\ProviderRepositoryInterface;
use App\Services\Providers\ProviderService;
use App\Services\Providers\ProviderServiceInterface;
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
        $this->app->bind(ProviderServiceInterface::class, ProviderService::class);
        $this->app->bind(ProviderRepositoryInterface::class, ProviderRepository::class);
    }
}
