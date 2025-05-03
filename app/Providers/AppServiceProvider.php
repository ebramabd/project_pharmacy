<?php

namespace App\Providers;

use App\Repositories\IBranchRepo;
use App\Repositories\IBranchRequestRepo;
use App\Repositories\ICategoryRepo;
use App\Repositories\IChartsRepo;
use App\Repositories\ICreateRequestRepo;
use App\Repositories\Implementation\BranchRepo;
use App\Repositories\Implementation\BranchRequestRepo;
use App\Repositories\Implementation\CategoryRepo;
use App\Repositories\Implementation\ChartsRepo;
use App\Repositories\Implementation\CreateRequestRepo;
use App\Repositories\Implementation\OrderRepo;
use App\Repositories\Implementation\ProductRepo;
use App\Repositories\Implementation\ReportsRepo;
use App\Repositories\Implementation\StoreRepo;
use App\Repositories\Implementation\UserRepo;
use App\Repositories\IOrderRepo;
use App\Repositories\IProductRepo;
use App\Repositories\IReportsRepo;
use App\Repositories\IStoreRepo;
use App\Repositories\IUserRepo;
use App\Services\IBranchRequestService;
use App\Services\IBranchService;
use App\Services\ICategoryService;
use App\Services\IChartsService;
use App\Services\ICreateRequestService;
use App\Services\Implementation\BranchRequestService;
use App\Services\Implementation\BranchService;
use App\Services\Implementation\CategoryService;
use App\Services\Implementation\ChartsService;
use App\Services\Implementation\CreateRequestService;
use App\Services\Implementation\OrderService;
use App\Services\Implementation\ProductService;
use App\Services\Implementation\ReportsService;
use App\Services\Implementation\StoreService;
use App\Services\Implementation\UserService;
use App\Services\IOrderService;
use App\Services\IProductService;
use App\Services\IReportsService;
use App\Services\IStoreService;
use App\Services\IUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        //user
        $this->app->bind(IUserRepo::class, UserRepo::class);
        $this->app->bind(IUserService::class, UserService::class);
        //category
        $this->app->bind(ICategoryRepo::class, CategoryRepo::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        //branch
        $this->app->bind(IBranchRepo::class, BranchRepo::class);
        $this->app->bind(IBranchService::class, BranchService::class);
        //product
        $this->app->bind(IProductService::class, ProductService::class);
        $this->app->bind(IProductRepo::class, ProductRepo::class);
        //store
        $this->app->bind(IStoreRepo::class, StoreRepo::class);
        $this->app->bind(IStoreService::class, StoreService::class);
        //request and update order details
        $this->app->bind(ICreateRequestService::class, CreateRequestService::class);
        $this->app->bind(ICreateRequestRepo::class, CreateRequestRepo::class);
        //order
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IOrderRepo::class, OrderRepo::class);
        //charts
        $this->app->bind(IChartsService::class, ChartsService::class);
        $this->app->bind(IChartsRepo::class, ChartsRepo::class);
        //report
        $this->app->bind(IReportsService::class, ReportsService::class);
        $this->app->bind(IReportsRepo::class, ReportsRepo::class);
        //accept request
        $this->app->bind(IBranchRequestService::class, BranchRequestService::class);
        $this->app->bind(IBranchRequestRepo::class, BranchRequestRepo::class);
    }
}
