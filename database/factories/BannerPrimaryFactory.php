<?php

namespace Database\Factories;

use App\Models\BannerPrimary;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerPrimaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BannerPrimary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'banner_primary_id' => $this->faker->uuid(),
            'banner_primary_image' => 'https://placekitten.com/500',
        ];
    }
}
