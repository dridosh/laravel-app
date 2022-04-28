<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    protected $model=State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'likes'=>$this->faker->numberBetween(1,10),
            'views'=>$this->faker->numberBetween(11,100),
            //
        ];
    }
}
