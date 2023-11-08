<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\DB;
use Src\Product\Application\UseCases\Queries\GetProductListQuery;
use Tests\TestCase;

class GetProductListTest extends TestCase
{
    public function test_count(){
        $count_in_db = DB::table('products')->where('is_active', True)->count();

        $product_list = (new GetProductListQuery())->handle();

        $this->assertEquals($count_in_db, count($product_list));
    }
}
