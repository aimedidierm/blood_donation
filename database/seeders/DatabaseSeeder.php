<?php

namespace Database\Seeders;

use App\Enums\UserType;
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
        User::create([
            'name' => 'System Colector',
            'email' => 'admin@test.com',
            'phone' => '0788750979',
            'password' => bcrypt('0788750979'),
            'type' => UserType::COLLECTOR->value,
        ]);
    }
}
