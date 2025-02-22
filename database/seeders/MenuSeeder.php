<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['key' => 'user', 'name' => 'User','group_menu' => 'User'],
           


            ['key' => 'follow_up', 'name' => 'Follow Up','group_menu' => 'Follow up'],
            ['key' => 'create_follow_up', 'name' => 'Create Follow Up','group_menu'=> 'Follow up'],
            ['key' => 'priority', 'name' => 'Priority','group_menu' => 'Follow up'],
            ['key' => 'student', 'name' => 'Student','group_menu' => 'Follow up'],
            ['key' => 'admission', 'name' => 'Admission','group_menu' => 'Follow up'],


         
            ['key' => 'student_fees', 'name' => 'Manage Fees', 'group_menu' => 'Fees'],
            ['key' => 'student_fees_dashboard_create', 'name' => 'Outstanding Fees', 'group_menu' => 'Fees'],
            ['key' => 'calendar', 'name' => 'Calendar', 'group_menu' => 'Fees'],
            ['key' => 'event', 'name' => 'Add Event', 'group_menu' => 'Fees'],
        ];
        DB::table('menus')->insert($menus);
    }
}
