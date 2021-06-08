<?php

namespace Database\Factories;

use App\Models\ProductView;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductView::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_view_id' => $this->faker->uuid,
            'product_view_count' => mt_rand(1, 500),
        ];
    }
}
