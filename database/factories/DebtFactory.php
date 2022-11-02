<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            "d_name"=>$this->faker->name(),
            "d_phone"=>$this->faker->phoneNumber(),
            "cost"=>rand(1000,100000),
            "date"=>\Carbon\Carbon::parse($this->faker->dateTime($max = 'now', $timezone = null))->format('d-m-Y H:i:s')

        ];
    }
}
