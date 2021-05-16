<?php

namespace Database\Factories;

use App\Models\AttendedSchool;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendedSchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttendedSchool::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(3),
            'type' => $this->faker->randomElement(['Creche', 'Pré-escola', 'Ensino médio']),
            "school_grade" => $this->faker->word(),
            'city' => $this->faker->city(),
            'administrative_department' => $this->faker->word(),
            'network' => $this->faker->randomElement(['Particular', 'Público', 'Particular com bolsa']),
            "year" => $this->faker->year('-2 years'),
            // 'person_id' => Person::factory()->hasJob(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
