<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Contoh data untuk tabel role_menus
         $data = [
            ['role_id' => 1, 'menu_id' => 1],
            ['role_id' => 1, 'menu_id' => 2],
            ['role_id' => 1, 'menu_id' => 3],
            ['role_id' => 2, 'menu_id' => 11],
            ['role_id' => 2, 'menu_id' => 12],
            ['role_id' => 2, 'menu_id' => 13],
            
        ];

        // Insert data ke tabel role_menus
        DB::table('role_menus')->insert($data);
    }
}
