<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['payment_method_name' => 'Cash'],
            ['payment_method_name' => 'Debit Card'],
            ['payment_method_name' => 'Scan'],
        ]);
    }
}
