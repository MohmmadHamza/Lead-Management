<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            [
                'name' => 'Followup Module',
                'description' => 'Includes followup, users, students, and admission permissions.',
                'price_per_user' => 50.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Fees Module',
                'description' => 'Enables fees management features.',
                'price_per_user' => 30.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
