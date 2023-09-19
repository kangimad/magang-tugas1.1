<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->randomNumber(4, true),
            'name' => fake()->company(),
            'group_id' => mt_rand(1, 9),
            'type_id' => mt_rand(1, 9),
            'class' => fake()->word(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'province_id' => mt_rand(1, 9),
            'regency_id' => mt_rand(1, 9),
            'district_id' => mt_rand(1, 9),
            'village_id' => mt_rand(1, 9),
            'created_by' => 1,
        ];
    }
}
