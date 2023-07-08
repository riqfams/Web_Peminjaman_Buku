<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Anggota;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    protected $model = Anggota::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();
        return [
            'nama' => $faker->name(),
            'kelamin' => Arr::random(['L', 'P']),
            'nim' => $faker->numberBetween(46110000, 46150000),
            'prodi_id' => Arr::random([4611, 4612, 4613, 4614, 4615]),
            'alamat' => $faker->address()  
        ];
    }
}
