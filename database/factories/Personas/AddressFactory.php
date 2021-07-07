<?php

namespace Database\Factories\Personas;

use App\Models\Personas\Address;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id'          => Persona::factory(),
            'owner_type'        => 'persona',
            'street'            => $this->faker->streetAddress,
            'street_extended'   => $this->faker->randomElement([null, $this->faker->streetSuffix]),
            'city'              => $this->faker->city,
            'state'             => 'NY',
            'zip'               => $this->faker->postcode,
            'country'           => 'US',
        ];
    }
}
