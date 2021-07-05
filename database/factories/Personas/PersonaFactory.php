<?php

namespace Database\Factories\Personas;

use App\Models\Personas\Persona;
use App\Models\Users\User;
use Database\Factories\Personas\DemographicFactory;
use Database\Factories\Personas\PhoneFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'owner_id'      => User::factory(),
            'owner_type'    => 'user',
            'first_name'    => $this->faker->firstName($gender),
            'middle_name'   => $this->faker->firstName($gender),
            'last_name'     => $this->faker->lastName,
            'birthdate'     => $this->faker->dateTimeBetween('-95 years', '-1 months')->format(config('app.dateformat')),
        ];
    }


    /**
     * After creating the persona, create
     * all of the other relationship models
     */
    public function createAddressPhone($countPhones)
    {
        return $this->afterCreating(
            function (Persona $persona) use ($countPhones) {
                // Only 1 address
                AddressFactory::new()->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
                // Upto $countPhones phones
                PhoneFactory::new()->count($countPhones)->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
                // Only 1 demographic
                DemographicFactory::new()->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
            }
        );
    }
}
