<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ar_EG');
        $faker = \Faker\Factory::create('ar_EG');
        $sections = Section::all()->pluck('id')->toArray();

        if ($sections) {
            return [
                'name' => $faker->unique()->word(),
                'section_id' => $faker->randomElement($sections),
            ];
        } else {
            return [];
        }
    }
}
