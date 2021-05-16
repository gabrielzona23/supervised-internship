<?php

namespace Database\Factories;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            'rg' => $this->faker->rg(),
            'cpf' => $this->faker->cpf(),
            'nis' => $this->faker->numberBetween($min = 10000, $max = 99999999999),
            'born_city' => $this->faker->city(),
            'emitter_rg' => 'ssp',
            'phone1' => $this->faker->cellphoneNumber(true, true),
            'phone2' => $this->faker->optional()->cellphoneNumber(true, true),
            'born_state' => $this->faker->state(),
            'created_by' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
