<?php

namespace App\Providers;

//use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
//use Nette\Utils\Paginator;

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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-test', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('create-test', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-test', function (User $user) {
            return $user->is_admin;
        });

        /////////////////////////////////////////////

        Gate::define('destroy-question', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('create-question', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-question', function (User $user) {
            return $user->is_admin;
        });

        /////////////////////////////////////////////

        Gate::define('destroy-option', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('create-option', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-option', function (User $user) {
            return $user->is_admin;
        });

        //////////////////////////////////////////////////

        Gate::define('index-user', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('show-user', function (User $user) {
            return $user->is_admin;
        });
    }
}
