<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->firstName($gender = 'female');
        $surname = $this->faker->lastName();
        $hair_length = (string) rand(0,2);
        return [
            'name' => $name,
            'surname' => $surname,
            'email' => Str::lower($name . '.' . $surname) . '@example.pl',
            'gender' => '0',
            'hair_length' => $hair_length,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'avatar' => 'app-assets/images/portrait/small/avatar-female.png',
            'city' => $this->faker->city()
        ];
    }
}
