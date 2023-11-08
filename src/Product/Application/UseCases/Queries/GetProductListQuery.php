<?php
namespace Src\Product\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\Product\Domain\Repositories\ProductRepositoryInterface;
use Src\Product\Domain\Services\ProductService;

class GetProductListQuery implements QueryInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->productRepository = app()->make(ProductRepositoryInterface::class);
    }

    public function handle(): array
    {
        return array_map(function ($product){
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price
            ];
        }, ProductService::getList($this->productRepository));
    }
}
