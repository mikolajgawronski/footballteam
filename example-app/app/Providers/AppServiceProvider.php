<?php

namespace App\Providers;

use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserDataMapperInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Http\Mappers\CardDataMapper;
use App\Http\Mappers\DuelDataMapper;
use App\Http\Mappers\UserDataMapper;
use App\Http\Repositories\CardRepository;
use App\Http\Repositories\DuelRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\CardService;
use App\Http\Services\DuelService;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //data mappers
        $this->app->bind(
            UserDataMapperInterface::class,
            UserDataMapper::class
        );
        $this->app->bind(
            DuelDataMapperInterface::class,
            DuelDataMapper::class
        );
        $this->app->bind(
            CardDataMapperInterface::class,
            CardDataMapper::class
        );

        //services
        $this->app->bind(
            CardServiceInterface::class,
            CardService::class
        );
        $this->app->bind(
            DuelServiceInterface::class,
            DuelService::class
        );
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );

        //repositories
        $this->app->bind(
            CardRepositoryInterface::class,
            CardRepository::class
        );
        $this->app->bind(
            DuelRepositoryInterface::class,
            DuelRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
