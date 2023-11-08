<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')
            ->insert([
                [
                    'name' => 'Наушники',
                    'price' => 100,
                    'is_active' => True,
                ],
                [
                    'name' => 'Чехол для телефона',
                    'price' => 20,
                    'is_active' => True,
                ],
                [
                    'name' => 'То что спрятано',
                    'price' => 20,
                    'is_active' => False,
                ],
            ]);
    }
}
