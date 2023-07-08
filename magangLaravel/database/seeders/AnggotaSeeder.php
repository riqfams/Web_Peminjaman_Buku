<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Illuminate\Support\Facades\Schema;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Anggota::insert([
        //     'nama' => 'joko',
        //     'kelamin' => 'L',
        //     'nim' => 46114211,
        //     'prodi_id' => 4611,
        //     'alamat' => 'patemon'
        // ]);
        // Schema::enableForeignKeyConstraints();

        Anggota::factory()->count(9)->create();
    }
}
