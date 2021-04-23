<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Responsibly;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsiblyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Responsibly::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "family_bag" => $this->faker->numberBetween($min = 0, $max = 1),
            "active" => $this->faker->numberBetween($min = 0, $max = 1),
            'number_card_family_bag' => $this->faker->unique()->numberBetween($min = 10000, $max = 99999999),
            'kinship' => $this->faker->randomElement(['Mãe', 'Pai', 'Primo 1º', 'Avós', 'Tio']),
            'created_by' => 1,
            'person_id' => Person::factory()/*->hasAttached(Address::factory())*/,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
