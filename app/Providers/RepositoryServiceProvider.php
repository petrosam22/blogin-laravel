<?php

namespace App\Providers;

use App\Repositories\PostRepositories;
use App\Repositories\UserRepositories;
use Illuminate\Support\ServiceProvider;
use App\interfaces\PostRepositoryInterface;
use App\interfaces\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepositories::class);
        $this->app->bind(PostRepositoryInterface::class,PostRepositories::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
