<?php

namespace Database\Factories;

use App\Enums\CargoTypeEnum;
use App\Enums\TruckTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'client_name' => fake()->name,
            'loading_date' => fake()->date,
            'loading_country' => fake()->country,
            'loading_location' => fake()->city,
            'loading_street' => fake()->streetAddress(),
            'loading_number' => fake()->randomDigit(),
            'loading_number' => fake()->randomDigit(),
            'unloading_country' => fake()->country,
            'unloading_location' => fake()->city,
            'unloading_street' => fake()->streetAddress(),
            'unloading_number' => fake()->randomDigit(),
            'unloading_number' => fake()->randomDigit(),
            'type_of_cargo' => [
                fake()->randomElement(CargoTypeEnum::cases())->value
            ],
            'tonnage' => fake()->randomNumber(2),
            'volume' => fake()->randomNumber(2),
            'truck_type' => fake()->randomElement(TruckTypeEnum::cases())->value,
            'value' => fake()->randomNumber(3)
        ];
    }
}
