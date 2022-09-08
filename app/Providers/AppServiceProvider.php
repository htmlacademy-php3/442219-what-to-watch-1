<?php

namespace App\Providers;

use App\Support\Import\FilmRepository;
use App\Support\Import\OmdbRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Support.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FilmRepository::class, OmdbRepository::class);
    }

    /**
     * Bootstrap any application Support.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
