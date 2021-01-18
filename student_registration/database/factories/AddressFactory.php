<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "city" => $this->faker->city,
            "number" => $this->faker->buildingNumber,
            'street' => $this->faker->streetName,
            'residential_area' => $this->faker->randomElement(['Urbana', 'Rural']),
            'type_transport' => $this->faker->randomElement(['Público', 'Particular', 'Escolar', 'Variado']),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'neighborhood' => $this->faker->word(),
            'cep' => $this->faker->numerify('#####-###'),
            'complement' => $this->faker->paragraph(1),
            'electrical_installation_core' => $this->faker->unique()->numberBetween($min = 10000, $max = 999999999),
            'reference' => $this->faker->paragraph(1),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
