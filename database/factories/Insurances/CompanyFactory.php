<?php

namespace Database\Factories\Insurances;

use App\Models\Insurances\Company;
use Database\Factories\Personas\AddressFactory;
use Database\Factories\Personas\PhoneFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                      => $this->faker->company,
            'contract_effective_date'   => $this->faker->dateTimeBetween('-5 years', '-1 year'),
            'payer_type'                => 'Other HCFA',
            'payer_id'                  => $this->faker->numberBetween(1000000, 9999999),
        ];
    }


    /**
     * After creating the company, create
     * address/phone relationships model
     */
    public function createAddressPhone()
    {
        return $this->afterCreating(
            function (Company $company) {
                // Add address
                AddressFactory::new()->create(['owner_id' => $company->insID, 'owner_type' => 'insurance']);
                // Upto $addPhone phones
                PhoneFactory::new()->count(1)->create(['owner_id' => $company->insID, 'owner_type' => 'insurance']);
            }
        );
    }
}
