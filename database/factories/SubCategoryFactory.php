<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategory::class;

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
            'sub_category_name' => $this->faker->streetName,
            'sub_category_image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1609097688/mock/gas-bottle-fullsize.svg',
        ];
    }
}
