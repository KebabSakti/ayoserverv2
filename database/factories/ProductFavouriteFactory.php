<?php

namespace Database\Factories;

use App\Models\ProductFavourite;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFavouriteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductFavourite::class;

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
            'product_favourites_id' => $this->faker->uuid,
        ];
    }
}
