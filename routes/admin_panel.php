<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BranchRequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('save/{id?}', [UserController::class, 'getViewSave'])->name('user.save.view');
        Route::post('save/{id?}', [UserController::class, 'save'])->name('user.save.post');
        Route::get('show', [UserController::class, 'showView'])->name('user.show');
        Route::get('delete/{id}', [UserController::class, 'deleted'])->name('user.delete');
        Route::post('logout', [AuthController::class, 'logoutWeb'])->name('logout');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('create/{id?}', [CategoryController::class, 'categorySavePage'])->name('category.create.view');
        Route::post('create/{id?}', [CategoryController::class, 'save'])->name('category.create.post');
        Route::get('show', [CategoryController::class, 'showAllCategory'])->name('category.show');
        Route::get('delete/{id}', [CategoryController::class, 'deleted'])->name('category.delete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('save/{id?}', [ProductController::class, 'getViewProduct'])->name('product.save.view');
        Route::post('save/{id?}', [ProductController::class, 'saveProduct'])->name('product.save.post');
        Route::get('show', [ProductController::class, 'showProductView'])->name('product.show');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::group(['prefix' => 'branch'], function () {
        Route::get('save/{id?}', [BranchController::class, 'branchSavePage'])->name('branch.save.view');
        Route::post('save/{id?}', [BranchController::class, 'save'])->name('branch.save.post');
        Route::get('show', [BranchController::class, 'AllBranchesPage'])->name('branch.show');
        Route::get('delete/{id}', [BranchController::class, 'deleted'])->name('branch.delete');
    });

    Route::group(['prefix' => 'store'], function () {
        Route::get('save/{id?}', [StoreController::class, 'getViewSave'])->name('store.save.view');
        Route::post('save', [StoreController::class, 'save'])->name('store.save.post');
        Route::get('show', [StoreController::class, 'showView'])->name('store.show');
        Route::get('delete/{id}', [StoreController::class, 'deleted'])->name('store.delete');
        Route::get('test', [UserController::class, 'testJoin']);
    });

    Route::group(['prefix' => 'request'], function () {
        Route::get('show', [BranchRequestController::class, 'allRequestPage'])->name('show-request');
        Route::post('accept-request', [BranchRequestController::class, 'acceptRequestBranch'])->name('accept-request');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('show', [ReportsController::class, 'showView'])->name('show-reports');
        Route::post('search', [ReportsController::class, 'search'])->name('search-reports');
        Route::get('search-product', [ReportsController::class, 'searchProductNum'])->name('search-product');
        Route::post('search-product', [ReportsController::class, 'getProductNum'])->name('get-product');
        Route::get('show-order-details/{id}', [ReportsController::class, 'showOrderDetails'])->name('showOrderDetails');
        Route::get('show-order-branch', [ReportsController::class, 'showAllOrderOfBranch'])->name('show-order-branch');
    });

    Route::group(['prefix' => 'charts'], function () {
        Route::get('chart-product', [ChartsController::class, 'getChartProduct'])->name('show-charts-product');
        Route::get('chart-branch', [ChartsController::class, 'getChartBranch'])->name('show-charts-branch');
    });

});
