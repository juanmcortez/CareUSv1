<?php

namespace Database\Factories\Patients;

use App\Models\Patients\Patient;
use Database\Factories\Personas\PersonaFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'externalID'                => random_int(1000000000, 9999999999),
            'patient_level_accession'   => $this->faker->randomElement(['', random_int(1000000000, 9999999999)]),
        ];
    }


    /**
     * After creating the patient, create
     * all of the other relationship models
     */
    public function createPatientPersona()
    {
        return $this->afterCreating(
            function (Patient $patient) {
                PersonaFactory::new()
                    ->count(1)
                    ->createAddressPhone(2)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                    ]);
            }
        );
    }
}
