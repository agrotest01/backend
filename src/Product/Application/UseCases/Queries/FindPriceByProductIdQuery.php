<?php
namespace Src\Product\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\Product\Domain\Repositories\ProductRepositoryInterface;
use Src\Product\Domain\Services\ProductService;

class FindPriceByProductIdQuery implements QueryInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        private readonly int $id
    )
    {
        $this->productRepository = app()->make(ProductRepositoryInterface::class);
    }

    public function handle(): float
    {
        return ProductService::getPriceById($this->productRepository, $this->id);
    }
}
