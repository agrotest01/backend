<?php

namespace Src\Product\Application\Repositories;

use Illuminate\Support\Facades\DB;
use Src\Product\Domain\Exceptions\NotFoundedByIdException;
use Src\Product\Domain\Models\Product;
use Src\Product\Domain\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function getList(): array
    {
        return array_map(function ($i){
            return new Product(
                $i->id,
                $i->name,
                $i->price,
                $i->is_active,
            );
        },DB::table('products')->where('is_active', true)->get()->toArray());
    }

    public function getItemById(int $id): Product
    {
        $item = DB::table('products')->find($id);
        if (!$item)
            throw new NotFoundedByIdException($id);

        return new Product(
            $item->id,
            $item->name,
            $item->price,
            $item->is_active,
        );
    }
}
