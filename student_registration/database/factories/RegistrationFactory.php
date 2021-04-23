<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\AttendedSchool;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "status_progress" => $this->faker->numberBetween($min = 0, $max = 100),
            'image_authorization' => $this->faker->numberBetween($min = 0, $max = 1),
            'guard_document' => $this->faker->numberBetween($min = 0, $max = 1),
            'parents_divorced' => $this->faker->numberBetween($min = 0, $max = 1),
            'student_custody' => $this->faker->name,
            'school_year' => $this->faker->date('Y'),
            'number_card_family_bag' => $this->faker->numberBetween($min = 1000000, $max = 99999999999),
            'student_id' => Student::factory()->hasAttached(Address::factory()->count(1))->hasAttached(AttendedSchool::factory()->count(1))->hasPrograms(1),
            'updated_by' => 1,
            'created_by' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
