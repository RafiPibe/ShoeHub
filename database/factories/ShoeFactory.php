<?php

namespace Database\Factories;

use App\Models\Shoe;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeFactory extends Factory
{
    protected $model = Shoe::class;

    public function definition()
    {
        return [
            'shoeName' => $this->faker->word,
            'shoeSize' => $this->faker->numberBetween(30, 50),
            'shoeImage' => $this->faker->text,
        ];
    }
}
