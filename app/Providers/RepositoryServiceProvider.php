<?php

namespace App\Providers;

use App\Repositories\Phone\PhoneRepository;
use App\Repositories\Phone\PhoneRepositoryInterface;
use App\Repositories\PhoneMessage\PhoneMessageRepository;
use App\Repositories\PhoneMessage\PhoneMessageRepositoryInterface;
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
        $this->app->singleton(PhoneRepositoryInterface::class, PhoneRepository::class);
        $this->app->singleton(PhoneMessageRepositoryInterface::class, PhoneMessageRepository::class);
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
