<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //
        Gate::define('login', function (User $user) {
            return $user->role != null;
        });
        Gate::define('kepala_lab', function (User $user) {
            return $user->role == "manager_teknis";
        });
        Gate::define('customer', function (User $user) {
            return $user->role == "customer";
        });
        Gate::define('pesanan', function (User $user) {
            return $user->role == "manager_teknis" || $user->role == "admin_frontoffice";
        });
        Gate::define('pengujian', function (User $user) {
            return $user->role == "manager_teknis" || $user->role == "supervisor";
        });
        Gate::define('hasil-pengujian', function (User $user) {
            return $user->role == "manager_teknis" || $user->role == "supervisor";
        });
        Gate::define('input-hasil-pengujian', function (User $user) {
            return $user->role == "manager_teknis" || $user->role == "analisis_lab";
        });
    }
}
