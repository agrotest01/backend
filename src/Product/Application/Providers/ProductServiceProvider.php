<?php

namespace Src\Product\Application\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\Product\Domain\Repositories\ProductRepositoryInterface::class,
            \Src\Product\Application\Repositories\ProductRepository::class,
        );

    }
}
