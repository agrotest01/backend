<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Src\Product\Application\UseCases\Queries\FindPriceByProductIdQuery;
use Src\Product\Domain\Exceptions\IsNoteActiveException;
use Src\Product\Domain\Exceptions\NotFoundedByIdException;
use Tests\TestCase;

class FindPriceByProductIdTest extends TestCase
{

    public function test_wrong_id(): void
    {
        $this->expectException(NotFoundedByIdException::class);

        (new FindPriceByProductIdQuery(100))->handle();
    }


    public function test_inactive_product(): void
    {
        $this->expectException(IsNoteActiveException::class);

        $inactive_product = DB::table('products')->where('is_active', false)->first();

        (new FindPriceByProductIdQuery($inactive_product->id))->handle();
    }

    public function test_success_result() : void
    {
        $product = DB::table('products')->where('is_active', true)->first();

        $price =  (new FindPriceByProductIdQuery($product->id))->handle();

        $this->assertEquals($product->price, $price);
    }
}
