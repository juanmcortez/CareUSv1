<?php

namespace Database\Seeders;

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
        //User::factory()->createUserPersona()->create();

        // Temp user
        $this->command->info("Creating user.");

        $user = User::factory([
            'username'      => 'ultradmin',
            'email'         => 'juanm.cortez@gmail.com',
            'password'      => bcrypt('123456789'),
        ])->create();

        PersonaFactory::new()
            ->create([
                'owner_id'      => $user->id,
                'owner_type'    => 'user',
                'first_name'    => 'Juan',
                'middle_name'   => 'Manuel',
                'last_name'     => 'Cortéz',
                'birthdate'     => date('Y-m-d', strtotime('04-08-1980'))
            ]);
    }
}
