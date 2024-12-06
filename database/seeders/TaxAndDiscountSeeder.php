<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaxAndDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tax_and_discounts')->insert([
            'tax' => 10.00, // Pajak default 10%
            'discount' => 5.00, // Diskon default 5%
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
