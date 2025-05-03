<?php

use App\Http\Controllers\AdminBranches\Admin_branch;
use App\Http\Controllers\AdminBranches\OrderController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\BranchRequestController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;




Route::get('/testMiddleware' , function()
{
    return 'i hope to done' ;
})->middleware('admin') ;


Route::group([ 'prefix' => '/'  ], function () {
    Route::get('/'           , [AuthController::class , 'loginView'])   ->name('login');
    Route::post('login'          , [AuthController::class , 'loginWeb'])       ->name('login.process');
});











