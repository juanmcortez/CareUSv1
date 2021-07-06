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
            'patient_email'             => $this->faker->freeEmail,
            'created_at'                => $this->faker->dateTimeBetween('-12 months', '-7 days'),
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
                    ->createDemographic(true, true, 2)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                    ]);

                $contactType = $this->faker->randomElement(['father', 'mother', 'husband', 'spouse', 'son', 'daughter', 'guardian', 'relative', 'other']);
                PersonaFactory::new()
                    ->count(3)
                    ->createDemographic(false, false, 1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'contact',
                        'contact_type'  => $contactType,
                    ]);

                PersonaFactory::new()
                    ->count(1)
                    ->createDemographic(true, true, 1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'employer',
                    ]);

                PersonaFactory::new()
                    ->count(3)
                    ->createDemographic(false, true, 2)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'subscriber',
                    ]);
            }
        );
    }
}
