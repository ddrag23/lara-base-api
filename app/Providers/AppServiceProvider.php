<?php

namespace App\Providers;

use App\Contracts\RepositoryContract;
use App\Contracts\ServiceContract;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\BaseService;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
