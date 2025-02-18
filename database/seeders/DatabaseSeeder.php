<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Ardavan Shamroshan',
            'email' => 'admin@test.com',
            'role'  => 'admin',
        ]);

        User::factory(5)->create();
    }
}
