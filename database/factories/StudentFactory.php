<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 3,
            'regid' => rand(100,999),
            'name' => 'sheela',
            'class' => 'B.Com',
            'gender' => 'female',
            'dob' => '1999-10-11',
            'mobile' => '999999999',
            'address' => 'Your address, your state'
        ];
    }
}
