<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ar_EG');
        return [
            'name' => $faker->word,
            'image' => $faker->imageUrl(),
            'retail_price' => $faker->numberBetween(100, 1000),
            'wholesale_price' => $faker->numberBetween(50, 500),
            'box_price' => $faker->numberBetween(10, 100),
            'discount' => $faker->numberBetween(0, 50),
            'purchase_price' => $faker->numberBetween(50, 500),
            'stock' => $faker->numberBetween(0, 100),
            'max_order_limit' => $faker->numberBetween(1, 10),
            'rate' => $faker->randomFloat(2, 0, 5),
            'rate_count' => $faker->numberBetween(0, 100),
            'company_id' => \App\Models\Company::factory()->create()->id,
            'category_id' => \App\Models\Category::factory()->create()->id,
            'section_id' => \App\Models\Section::factory()->create()->id,
        ];
    }
}
