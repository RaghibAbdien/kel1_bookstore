<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\VariantsSeeder;
use Database\Seeders\SuppliersSeeder;
use Database\Seeders\WarehouseSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\TaxAndDiscountSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            VariantsSeeder::class,
            WarehouseSeeder::class,
            SuppliersSeeder::class,
            TaxAndDiscountSeeder::class,
        ]);
    }
}
