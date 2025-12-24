<?php

use App\Http\Controllers\AdminBranches\Admin_branch;
use App\Http\Controllers\AdminBranches\CreateRequestController;
use App\Http\Controllers\AdminBranches\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'request'], function () {
        Route::get('get-categories', [CreateRequestController::class, 'getCategories'])->name('getCategories');
        Route::get('get-products/{cat_id}', [CreateRequestController::class, 'getProducts'])->name('getProducts');
        Route::get('get-details-product/{prod_id}', [CreateRequestController::class, 'getDetailsProducts'])->name('getDetailsProducts');
        Route::post('add-request', [CreateRequestController::class, 'addRequest'])->name('addRequest');
        Route::post('update-store', [CreateRequestController::class, 'updateStore'])->name('update-store');
        Route::get('get-product-with-branch', [CreateRequestController::class, 'getProductsWithBranch'])->name('getProductsWithBranch');
    });

    Route::get('index', [Admin_branch::class, 'afterLogin'])->name('afterLogin');

    Route::group(['prefix' => 'order'], function () {
        Route::get('make-order', [OrderController::class, 'getView'])->name('make-order');
        Route::post('store-order', [OrderController::class, 'store'])->name('store-order');
    });
});
