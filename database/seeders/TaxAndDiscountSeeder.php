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
            'tax' => 0.00, // Pajak default 0%
            'shiping' => 0.00, // Pengiriman default 0%
            'discount' => 0.00, // Diskon default 0%
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
