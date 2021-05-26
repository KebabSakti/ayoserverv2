<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->uuid,
            'sub_category_id' => $this->faker->uuid,
            'product_id' => $this->faker->uuid,
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->text(2000),
            'product_cover' => 'https://placekitten.com/1000',
            'product_price' => $this->faker->numberBetween(1000, 100000),
            'product_point' => $this->faker->numberBetween(0, 100),
        ];
    }
}
