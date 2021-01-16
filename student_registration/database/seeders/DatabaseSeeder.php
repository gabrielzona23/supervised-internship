<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\School;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModuleQuestionSeeder::class,
            ProgramSeeder::class,
            QuestionSeeder::class,
            VaccineSeeder::class,
            DocumentSeeder::class,
        ]);
        User::factory()->count(1)->create();
        School::factory()->count(1)->create();
        Registration::factory()->count(50)->hasResponsiblies()->create();
    }
}
