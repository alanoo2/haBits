<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Habits;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('modify-habit', function ($user, Habits $habit) {
            return $user->id === $habit->user_id;
        });

        // comentar en local
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }
}
