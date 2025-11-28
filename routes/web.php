<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/testMiddleware', function () {
    return 'i hope to done' ;
})->middleware('admin') ;

Route::group([ 'prefix' => '/'  ], function () {
    Route::get('/', [AuthController::class , 'loginView'])   ->name('login');
    Route::post('login', [AuthController::class , 'loginWeb'])       ->name('login.process');
});
