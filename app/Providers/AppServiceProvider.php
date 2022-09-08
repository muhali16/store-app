<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Blade::directive('currency', function ( $expression ) { 
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; 
        });

        Gate::define('canteen-dashboard', function (User $user) {
            return $user->level == 2;
        });

        Gate::define('open-canteen', fn(User $user) => $user->level == 3);

        Gate::define('auth-user', fn() => auth()->check());
    }

    
}
