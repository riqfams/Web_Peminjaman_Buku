<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 4611, 'name' => 'Teknik informatika'],
            ['id' => 4612, 'name' => 'Sistem Informasi'],
            ['id' => 4613, 'name' => 'Pendidikan Matematika'],
            ['id' => 4614, 'name' => 'Fisika'],
            ['id' => 4615, 'name' => 'Farmasi']
        ];
       
        foreach ($data as $value){
            Prodi::insert([
                'id' => $value['id'],
                'name' => $value['name']
            ]);
        }
        
    }
}
