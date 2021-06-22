<?php

namespace Database\Factories\Personas;

use App\Models\Personas\Persona;
use App\Models\Users\User;
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
            'birthdate'     => $this->faker->dateTimeBetween('-80 years', '-10 years'),
        ];
    }
}
