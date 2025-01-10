<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'عرض المستخدمين']);
        Permission::create(['name' => 'انشاء مستخدم']);
        Permission::create(['name' => 'تعديل مستخدم']);
    }
}
