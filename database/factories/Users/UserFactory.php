<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use Database\Factories\Personas\PersonaFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'          => $this->faker->userName,
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'last_login_at'     => now(),
            // 'email_verified_at' => now(),
            // 'remember_token'    => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }


    /**
     * After creating the user, create
     * all of the other relationship models
     */
    public function createUserPersona()
    {
        return $this->afterCreating(
            function (User $user) {
                PersonaFactory::new()
                    ->count(1)
                    ->createDemographic(true, true, 1)
                    ->create([
                        'owner_id'      => $user->id,
                        'owner_type'    => 'user',
                    ]);
            }
        );
    }
}
