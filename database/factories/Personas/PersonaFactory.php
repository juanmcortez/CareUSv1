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
        $decease_date = $this->faker->dateTimeBetween('-5 years', '-7 days')->format(config('app.dateformat'));
        $decease_optn = $this->faker->randomElement([[$decease_date, 'Covid-19'], [null, null], [null, null], [null, null], [null, null]]);

        return [
            'owner_id'          => User::factory(),
            'owner_type'        => 'user',
            'first_name'        => $this->faker->firstName($gender),
            'middle_name'       => $this->faker->firstName($gender),
            'last_name'         => $this->faker->lastName,
            'birthdate'         => $this->faker->dateTimeBetween('-95 years', '-1 months')->format(config('app.dateformat')),
            'gender'            => $this->faker->randomElement([null, 'male', 'female', 'male', 'female', 'male', 'female', 'agender', 'nononforming', 'cisgender', 'cishet', 'transgender', 'genderqueer', 'genderfluid', 'nonbinary', 'intersex']),
            'social_security'   => random_int(001, 899) . '-' . random_int(10, 99) . '-' . random_int(0001, 9999),
            'decease_date'      => $decease_optn[0],
            'decease_reason'    => $decease_optn[1],
        ];
    }


    /**
     * After creating the persona, create
     * demographic relationships model
     *
     * @param boolean $addDemo Indicate true or false to add demographics
     * @param boolean $addAddr Indicate true or false to add address
     * @param boolean $addPhone Indicate the number of phones to add or false
     *
     */
    public function createDemographic($addDemo = false, $addAddr = false, $addPhone = false)
    {
        return $this->afterCreating(
            function (Persona $persona) use ($addDemo, $addAddr, $addPhone) {
                if ($addDemo) {
                    // Add demographic
                    $company_name       = ($persona->owner_type == 'employer') ? $this->faker->company : null;
                    $company_position   = ($persona->owner_type == 'employer') ? $this->faker->jobTitle : null;
                    DemographicFactory::new()->create([
                        'owner_id' => $persona->id,
                        'owner_type' => 'persona',
                        'company_name' => $company_name,
                        'company_position' => $company_position,
                    ]);
                }
                if ($addAddr) {
                    // Add address
                    AddressFactory::new()->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
                }
                if ($addPhone) {
                    // Upto $addPhone phones
                    PhoneFactory::new()->count($addPhone)->create(['owner_id' => $persona->id, 'owner_type' => 'persona']);
                }
            }
        );
    }
}
