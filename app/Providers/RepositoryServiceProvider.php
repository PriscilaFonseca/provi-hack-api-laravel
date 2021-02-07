<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository; 

use App\Repositories\ChallengeRepositoryInterface; 
use App\Repositories\Eloquent\ChallengeRepository;

use App\Repositories\UserChallengeCompletedRepositoryInterface; 
use App\Repositories\Eloquent\UserChallengeCompletedRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ChallengeRepositoryInterface::class, ChallengeRepository::class);
        $this->app->bind(UserChallengeCompletedRepositoryInterface::class, UserChallengeCompletedRepository::class);
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
