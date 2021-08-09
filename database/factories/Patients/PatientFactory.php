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
     *
     * @param integer $totalinsurances
     *
     */
    public function createPatientPersona($totalinsurances)
    {
        return $this->afterCreating(
            function (Patient $patient) use ($totalinsurances) {
                PersonaFactory::new()
                    ->createDemographic(true, true, 2)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'patient',
                    ]);

                for ($i = 0; $i <= 2; $i++) {
                    $rand_typ = $this->faker->randomElement(['father', 'mother', 'husband', 'spouse', 'son', 'daughter', 'guardian', 'relative', 'other']);
                    PersonaFactory::new()
                        ->createDemographic(false, false, 1)
                        ->create([
                            'owner_id'      => $patient->patID,
                            'owner_type'    => 'contact',
                            'contact_type'  => $rand_typ,
                        ]);
                }

                PersonaFactory::new()
                    ->createDemographic(true, true, 1)
                    ->create([
                        'owner_id'      => $patient->patID,
                        'owner_type'    => 'employer',
                    ]);

                for ($i = 0; $i <= 2; $i++) {
                    $rand_lvl = $this->faker->randomElement(['primary', 'secondary', 'tertiary']);
                    $rand_ins = $this->faker->numberBetween(1, $totalinsurances);
                    PersonaFactory::new()
                        ->count(1)
                        ->createDemographic(false, true, 2)
                        ->create([
                            'owner_id'          => $patient->patID,
                            'owner_type'        => 'subscriber',
                            'subscriber_level'  => $rand_lvl,
                            'subscriber_insID'  => $rand_ins,
                        ]);
                }
            }
        );
    }
}
