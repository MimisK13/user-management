<?php

namespace Mimisk13\UserManagement;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mimisk13\UserManagement\Http\Middleware\SpatiePermissionMiddleware;

class UserManagementServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('user-management')
            ->as('user-management.')
            ->middleware(config('user-management.middleware', ['web', 'spatie-permission']))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('spatie-permission', SpatiePermissionMiddleware::class);


        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'user-management');

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('user-management'),
            ], 'assets');

            // In addition to publishing assets, we also publish the config
            $this->publishes([
                __DIR__.'/../config/user-management.php' => config_path('user-management.php'),
            ], 'user-management-config');
        }
    }
}
