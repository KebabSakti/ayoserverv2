<?php

namespace Database\Factories;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Search::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => '1qHy6ec31RRoxKHxSh7LvPS4OLy2',
            'search_id' => $this->faker->uuid,
            'search_keyword' => $this->faker->word
        ];
    }
}
