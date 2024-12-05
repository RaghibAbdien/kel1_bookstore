<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variants = [
            'Biography',
            'Comics',
            'Culture',
            'Development',
            'Economics',
            'Geography',
            'History',
            'Novel',
            'Religion',
            'Science',
            'Technology',
            'Translation',
            'Language'
        ];

        foreach ($variants as $variant) {
            DB::table('variants')->insert([
                'variant_name' => $variant,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
