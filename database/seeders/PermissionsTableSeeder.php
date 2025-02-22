<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Fees module permissions
           
            ['name' => 'event.view', 'guard_name' => 'web', 'group_name' => 'event', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'event.create', 'guard_name' => 'web', 'group_name' => 'event', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'event.edit', 'guard_name' => 'web', 'group_name' => 'event', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'event.delete', 'guard_name' => 'web', 'group_name' => 'event', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'event.update', 'guard_name' => 'web', 'group_name' => 'event', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'calendar.view', 'guard_name' => 'web', 'group_name' => 'calendar', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'calendar.create', 'guard_name' => 'web', 'group_name' => 'calendar', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'calendar.edit', 'guard_name' => 'web', 'group_name' => 'calendar', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'calendar.delete', 'guard_name' => 'web', 'group_name' => 'calendar', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'calendar.update', 'guard_name' => 'web', 'group_name' => 'calendar', 'module_name' => 'Fees Module', 'created_at' => now(), 'updated_at' => now()],
        ];
    
        DB::table('permissions')->insert($permissions);
    }
}
