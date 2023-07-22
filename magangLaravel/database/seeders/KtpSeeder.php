<?php

namespace Database\Seeders;

use App\Models\Ktp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ktp::factory()->count(3)->create();
    }
}
