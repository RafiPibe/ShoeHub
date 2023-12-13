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
            'shoeSize' => $this->faker->randomElement(['30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50']),
            'shoePrice' => $this->faker->randomFloat(2, 10, 100),
            'outletId' => null,
            'shoeImage' => base64_encode($this->faker->image('public/storage', 400, 300, null, false)),
            'shoeDescription' => $this->faker->sentence,
        ];
    }
}
