<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Mohamad Maraqa',
             'email' => 'admin@admin.com',
             'phone' => '0123456789',
             'status' => 1,
             'password' => Hash::make('123456789'),
         ]);
    }
}
