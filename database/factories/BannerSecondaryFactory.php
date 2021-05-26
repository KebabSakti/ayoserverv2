<?php

namespace Database\Factories;

use App\Models\BannerSecondary;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerSecondaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BannerSecondary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->uuid,
            'banner_secondary_id' => $this->faker->uuid,
            'banner_secondary_image' => 'https://placekitten.com/500',
        ];
    }
}
