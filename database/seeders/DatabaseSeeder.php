<?php

namespace Database\Seeders;

use App\Models\Insurances\Company;
use App\Models\Patients\Patient;
use App\Models\Users\User;
use Database\Factories\Personas\PersonaFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $totaldata = 0;

        // Temp insurances
        $totalinsurances = random_int(5, 95);
        $this->command->info("Creating $totalinsurances insurance companies.");
        $totaldata += $totalinsurances;

        Company::factory($totalinsurances)->createAddressPhone()->create();

        // Temp patients
        $totalpatients = random_int(100, 1000);
        $totalcontacts = $totalpatients * 3;
        $this->command->info("Creating $totalpatients patient.");
        $totaldata += $totalpatients;
        $this->command->info("Creating $totalcontacts patient's contacts.");
        $totaldata += $totalcontacts;
        $this->command->info("Creating $totalpatients patient's employer.");
        $totaldata += $totalpatients;
        $this->command->info("Creating $totalcontacts patient's subscriber.");
        $totaldata += $totalcontacts;

        Patient::factory($totalpatients)->createPatientPersona($totalinsurances)->create();

        // Temp user
        $this->command->info("Creating user.");
        $user = User::factory([
            'username'          => 'superadmin',
            'email'             => 'juanm.cortez@gmail.com',
            'password'          => bcrypt('123456789'),
            'email_verified_at' => now(),
        ])->create();

        PersonaFactory::new()
            ->count(1)
            ->createDemographic(true, true, 1)
            ->create([
                'owner_id'      => $user->id,
                'owner_type'    => 'user',
                'first_name'    => 'Juan',
                'middle_name'   => 'Manuel',
                'last_name'     => 'Cortéz',
                'birthdate'     => date('Y-m-d', strtotime('1980-04-08')),
                'gender'        => 'male',
            ]);

        $this->command->info("Done creating $totaldata relationships.");
    }
}
