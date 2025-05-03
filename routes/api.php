<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth' ] , function(){
    Route::post('/register' , [AuthController::class , 'register'])->name('api.register');
    Route::post('/login' , [AuthController::class , 'login'])->name('api.login');
});

Route::group(['middleware'=>'auth:sanctum'] , function (){
    Route::post('/logout' , [AuthController::class , 'logout'])->name('api.logout');
    Route::post('/client-order' , [AuthController::class , 'order'])->name('api.order');
});
