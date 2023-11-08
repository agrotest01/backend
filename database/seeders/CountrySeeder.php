<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_countries')
            ->insert([
                [
                    'sys_name' => 'DE',
                    'name' => 'Германия',
                    'tax_percent' => 19,
                    'is_active' => True,
                ],
                [
                    'sys_name' => 'IT',
                    'name' => 'Италия',
                    'tax_percent' => 22,
                    'is_active' => True,
                ],
                [
                    'sys_name' => 'GR',
                    'name' => 'Греция',
                    'tax_percent' => 24,
                    'is_active' => True,
                ],
                [
                    'sys_name' => 'RU',
                    'name' => 'Россия',
                    'tax_percent' => 40,
                    'is_active' => False,
                ],
            ]);
    }
}
