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
        $firstname = $this->faker->firstName($gender = 'female');
        $lastname = $this->faker->lastName();
        $hair_length = (string) rand(0,2);
        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => Str::lower($firstname . '.' . $lastname) . '@damianulan.me',
            'gender' => '0',
            'hair_length' => $hair_length,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'avatar' => 'app-assets/images/portrait/small/avatar-female.png',
            'city' => $this->faker->city()
        ];
    }
}
