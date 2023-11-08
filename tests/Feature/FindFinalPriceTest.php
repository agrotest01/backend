<?php
namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Src\Order\Application\UseCases\Queries\FindFinalPriceQuery;
use Tests\TestCase;

class FindFinalPriceTest extends TestCase
{
    public function test_success() : void
    {
        $product = DB::table('products')->where('is_active', true)->first();
        $italy = DB::table('ref_countries')->where('sys_name', 'IT')->first();

        $tax_num = 'IT123123123';

        $final_price = (new FindFinalPriceQuery($product->id, $tax_num))->handle();


        $this->assertEquals($final_price, ($product->price * (100 + $italy->tax_percent)) / 100);

    }
}
