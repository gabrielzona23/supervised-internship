<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionHealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_health_questions')->insertOrIgnore([
            'description' => 'Doenças que o aluno já teve:',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('student_health_questions')->insertOrIgnore([
            'description' => 'Problemas atuais de saúde:',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('student_health_questions')->insertOrIgnore([
            'description' => 'Experiências traumatizantes:',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('student_health_questions')->insertOrIgnore([
            'description' => 'Sansões aplicadas pelo lar:',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
