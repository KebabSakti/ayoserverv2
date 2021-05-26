<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->uuid(),
            'category_name' => 'Gas dan perlengkapan kompor',
            'category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1609097688/mock/gas-bottle-fullsize.svg',
        ];
    }
}
