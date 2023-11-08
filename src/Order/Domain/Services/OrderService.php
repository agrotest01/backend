<?php
namespace Src\Order\Domain\Services;

use Src\Country\Application\UseCases\Queries\FindPercentByCountrySysNameQuery;
use Src\Order\Domain\Models\CustomerAccount;
use Src\Product\Application\UseCases\Queries\FindPriceByProductIdQuery;

class OrderService
{
    public static function calculateFinalPrice(int $product_id, string $customer_tax_num) : float
    {
        $country_tax_percent = (
            new FindPercentByCountrySysNameQuery(
                (new CustomerAccount($customer_tax_num))->country_sys_name
            )
        )->handle();

        $product_price = (new FindPriceByProductIdQuery($product_id))->handle();

        return ($product_price * (100 + $country_tax_percent)) / 100;
    }
}
