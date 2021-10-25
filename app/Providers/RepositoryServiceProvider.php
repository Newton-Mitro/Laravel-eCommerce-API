<?php

namespace App\Providers;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\DeliveryInformation\DeliveryInformationRepository;
use App\Repositories\DeliveryInformation\DeliveryInformationRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Repositories\OrderItem\OrderItemRepositoryInterface;
use App\Repositories\OrderStatus\OrderStatusRepository;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductReview\ProductReviewRepository;
use App\Repositories\ProductReview\ProductReviewRepositoryInterface;
use App\Repositories\ProductUnit\ProductUnitRepository;
use App\Repositories\ProductUnit\ProductUnitRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Subcategory\SubcategoryRepository;
use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BrandRepositoryInterface::class,BrandRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(SubcategoryRepositoryInterface::class,SubcategoryRepository::class);
        $this->app->bind(ProductUnitRepositoryInterface::class,ProductUnitRepository::class);
        $this->app->bind(ProductReviewRepositoryInterface::class,ProductReviewRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(OrderStatusRepositoryInterface::class,OrderStatusRepository::class);
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class,OrderItemRepository::class);
        $this->app->bind(DeliveryInformationRepositoryInterface::class,DeliveryInformationRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
