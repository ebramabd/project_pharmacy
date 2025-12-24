<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Illuminate\Support\Facades\Route ;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function (){
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    )
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin_panel')
//                ->name('admin_panel.')
                ->group(base_path('routes/admin_panel.php'));

            Route::middleware('web')
                ->prefix('admin_branch')
//                ->name('admin_branch.')
                ->group(base_path('routes/admin_branch.php'));

            Route::middleware('api')
                ->prefix('api')
                ->name('api.')
                ->group(base_path('routes/api.php'));

        },
    )


    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('admin' , [
           \App\Http\Middleware\CheckUserLogin::class
        ]);

        $middleware->appendToGroup('admin_branch' , [
            \App\Http\Middleware\CheckAdminBranch::class
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
