<?php
namespace Src\Product\Domain\Services;

use Src\Product\Domain\Exceptions\IsNoteActiveException;
use Src\Product\Domain\Models\Product;
use Src\Product\Domain\Repositories\ProductRepositoryInterface;

class ProductService
{
    /**
     * @return Product[]
     */
    static function getList(ProductRepositoryInterface $productRepository) : array
    {
        return $productRepository->getList();
    }

    static function getPriceById(ProductRepositoryInterface $productRepository, int $id) : float
    {
        $product = $productRepository->getItemById($id);
        if (!$product->is_active)
            throw new IsNoteActiveException($product);

        return $product->price;
    }
}
