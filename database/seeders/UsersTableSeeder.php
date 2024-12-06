<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('role_name', 'admin')->value('id');

        DB::table('users')->insert([
            'role_id' => $adminRoleId,
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Gunakan hash untuk keamanan
            'address' => 'Jl. Contoh No. 1',
            'phone' => '081234567890',
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $customerRoleId = DB::table('roles')->where('role_name', 'customer')->value('id');

        DB::table('users')->insert([
            'role_id' => $customerRoleId,
            'name' => 'Customer User',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('password'), // Gunakan hash untuk keamanan
            'address' => 'Jl. Pelanggan No. 1',
            'phone' => '081234567891',
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
