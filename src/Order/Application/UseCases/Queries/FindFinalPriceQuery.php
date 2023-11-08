<?php
namespace Src\Order\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\Order\Domain\Services\OrderService;

class FindFinalPriceQuery implements QueryInterface
{
    public function __construct(
        private int $productId,
        private string $customerTaxNum
    ){}

    public function handle(): float
    {
        return OrderService::calculateFinalPrice($this->productId, $this->customerTaxNum);
    }
}
