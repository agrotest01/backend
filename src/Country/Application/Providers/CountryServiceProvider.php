<?php

namespace Src\Country\Application\Providers;

use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\Country\Domain\Repositories\CountryRepositoryInterface::class,
            \Src\Country\Application\Repositories\CountryRepository::class,
        );

    }
}
