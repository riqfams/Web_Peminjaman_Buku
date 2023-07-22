<?php

namespace Database\Factories;

use App\Models\Ktp;
use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ktp>
 */
class KtpFactory extends Factory
{
    protected $model = Ktp::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 17;

    public function definition(): array
    {
        
        $faker = faker::create();
        return [
            'anggota_id' => self::$order++,
            'nik' => mt_rand(33281000, 33999999)
        ];
    }
}
