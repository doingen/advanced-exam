<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postcode = $this->faker->postcode1. "-". $this->faker->postcode2;
        $address = $this->faker->prefecture.  $this->faker->streetAddress;

        return [
            'fullname' => $this->faker->name,
            'gender' => rand(1, 2),
            'email' => $this->faker->safeEmail,
            'postcode' => $postcode,
            'address' => $address,
            'opinion' => $this->faker->realText(50),
        ];
    }
}
