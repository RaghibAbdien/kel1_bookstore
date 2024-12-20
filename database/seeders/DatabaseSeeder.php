<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\VariantsSeeder;
use Database\Seeders\SuppliersSeeder;
use Database\Seeders\WarehouseSeeder;
use Database\Seeders\MenusTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\RoleMenuTableSeeder;
use Database\Seeders\TaxAndDiscountSeeder;
use Database\Seeders\PaymentMethodsTableSeeder;

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
            PaymentMethodsTableSeeder::class,
            MenusTableSeeder::class,
            RoleMenuTableSeeder::class,
        ]);
    }
}
