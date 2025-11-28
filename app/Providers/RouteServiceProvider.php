<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * AuthController any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //        RateLimiter::for('api', function (Request $request) {
        //            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        //        });
        //
        //        $this->routes(function () {
        //            Route::middleware('api')
        //                ->prefix('api')
        //                ->group(base_path('routes/api.php'));
        //
        //            Route::middleware('web')
        //                ->group(base_path('routes/web.php'));
        //        });
    }
}
