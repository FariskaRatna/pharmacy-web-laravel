<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nama_supplier' => $this->faker->companyPrefix.'.'.$this->faker->lastName,
        'email' => $this->faker->unique()->safeEmail,
        'telp' => '08'. mt_rand(1000000000, 9999999999),
        'rekening' => mt_rand(100000000000000, 999999999999999),
        'alamat' => $this->faker->streetAddress.'-'.$this->faker->city.'-'.$this->faker->postcode.
        '-'.$this->faker->stateAbbr,
        ];
    }
}
