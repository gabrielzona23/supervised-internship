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
            UserSeeder::class,
            VaccineSeeder::class,
            ProgramSeeder::class,
            DocumentSeeder::class,
            QuestionSeeder::class,
            QuestionHealthSeeder::class,
        ]);
        // User::factory()->count(1)->create();
        if (env('APP_ENV') == 'local') {
            School::factory()->count(1)->create();
            Registration::factory()->count(100)->hasResponsiblies()->create();
        }
    }
}
