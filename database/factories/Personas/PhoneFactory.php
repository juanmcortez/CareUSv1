<?php

namespace Database\Factories\Personas;

use App\Models\Personas\Persona;
use App\Models\Personas\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id'      => Persona::factory(),
            'owner_type'    => 'persona',
            'intl_code'     => '1',
            'area_code'     => $this->faker->randomNumber(3, true),
            'prefix'        => $this->faker->randomNumber(3, true),
            'line'          => $this->faker->randomNumber(4, true),
            'extension'     => $this->faker->randomNumber(2, true),
        ];
    }
}
