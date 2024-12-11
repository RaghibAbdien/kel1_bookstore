<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'menu_name' => 'Dashboard',
            'slug' => 'dashboard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('menus')->insert([
            'menu_name' => 'Role & Menu Access',
            'slug' => 'manage-role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage User',
            'slug' => 'manage-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage Catalog',
            'slug' => 'manage-catalog',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Tax And Discount',
            'slug' => 'manage-global-pricing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage Stock',
            'slug' => 'manage-stock',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage Warehouse',
            'slug' => 'manage-warehouse',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage Purchase',
            'slug' => 'manage-purchase',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('menus')->insert([
            'menu_name' => 'Manage Direct Sale',
            'slug' => 'manage-direct-sale',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Manage Virtual Sale',
            'slug' => 'manage-virtual sale',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Landing Page',
            'slug' => 'landing-page',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Bookstore',
            'slug' => 'show-bookstore',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Order History',
            'slug' => 'show-order-history',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'menu_name' => 'Reports & Analitics',
            'slug' => 'manage-report',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
