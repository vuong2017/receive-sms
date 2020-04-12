<?php

namespace App\Providers;

use App\Repositories\TextNow\TextNowRepository;
use App\Repositories\TextNow\TextNowRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TextNowRepositoryInterface::class, TextNowRepository::class);
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
