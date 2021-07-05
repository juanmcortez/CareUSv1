<?php

namespace Database\Factories\Personas;

use App\Models\Personas\Demographic;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemographicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demographic::class;

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
            'family_size'       => random_int(3, 7),
            'marital'           => $this->faker->randomElement(['', 'single', 'married', 'significantother', 'widowed', 'divorced', 'separated', 'domesticpartnership']),
            'marital_details'   => '',
            'language'          => $this->faker->randomElement(['en', 'es', 'fr']),
            'ethnicity'         => $this->faker->randomElement(['', 'americanindian', 'alaskanative', 'asian', 'africanamerican', 'nativehawaiian', 'otherpacificislander', 'white']),
            'race'              => $this->faker->randomElement(['', 'hispanic', 'latino', 'nothispanic', 'notlatino']),
        ];
    }
}
