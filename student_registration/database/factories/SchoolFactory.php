<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Dom Bosco',
            'phone_number' => '(69) 99999-9999',
            'email' => 'Dom_Bosco@hotmail.com',
            'regional_organization' => 'Estado do Acre',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
