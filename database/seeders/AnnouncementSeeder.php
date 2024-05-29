<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'message' => 'Dear blood doners, Join us in saving lives by donating blood on 31/06/2024 at BK Arena. Your donation can help up to three people in need. For more details, please contact Us. Thank you for your generosity! Warm regards,',
        ]);
    }
}
