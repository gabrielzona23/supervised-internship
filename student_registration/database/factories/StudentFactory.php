<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Job;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "born_date" => $this->faker->dateTime($max = 'yesterday', $timezone = 'America/Rio_Branco'),
            "color" => $this->faker->colorName,
            'inep_code' => $this->faker->unique()->numberBetween($min = 10000, $max = 99999999),
            'nationality' => 'Brasileira',
            'number_card_sus' => $this->faker->unique()->numberBetween($min = 10000, $max = 99999999),
            'g_mus' => $this->faker->unique()->numberBetween($min = 10000, $max = 99999999),
            'special_educational_needs' => $this->faker->words(3, true),
            'has_special_needs' => $this->faker->numberBetween($min = 0, $max = 1),
            'created_by' => 1,
            // 'person_id' => $this->faker->unique()->numberBetween($min = 1, $max = 30),
            'person_id' => Person::factory()->hasAttached(Address::factory())->hasJob(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
