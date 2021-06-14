<?php

namespace Database\Factories;

use App\Models\RatingProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RatingProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => \App\Models\Customer::inRandomOrder()->first()->customer_id,
            'product_id' => \App\Models\Product::inRandomOrder()->first()->product_id,
            'rating_product_id' => $this->faker->uuid,
            'rating_product_value' => $this->faker->numberBetween(1, 5),
            'rating_product_comment' => $this->faker->paragraph,
        ];
    }
}
