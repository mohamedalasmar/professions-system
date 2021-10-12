<?php

namespace Database\Factories;

use App\Models\Specaility;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecailityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specaility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_en'=>$this->faker->jobTitle,
            'title_ar'=>$this->faker->word,
        ];
    }
}
