<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System Collector',
            'email' => 'admin@test.com',
            'phone' => '0788750979',
            'password' => bcrypt('0788750979'),
            'type' => UserType::COLLECTOR->value,
        ]);
    }
}
