<?php
namespace Src\Product\Domain\Repositories;

use Src\Product\Domain\Models\Product;

interface ProductRepositoryInterface {

    /**
     * @return Product[]
     */
    public function getList(): array;

    public function getItemById(int $id): Product;
}
