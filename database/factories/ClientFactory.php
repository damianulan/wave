<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;

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
        $model = new Client();
        $firstname = $this->faker->firstName($gender = 'female');
        $lastname = $this->faker->lastName();
        $local_id = $model->getLID(5);
        $hair_length = (string) rand(0,2);
        return [
            'local_id' => $local_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => Str::lower($firstname . '.' . $lastname) . '@damianulan.me',
            'gender' => '0',
            'hair_length' => $hair_length,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'avatar' => 'images/portrait/small/avatar-female.png',
            'city' => $this->faker->city()
        ];
    }
}
