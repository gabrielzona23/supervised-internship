<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendedSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attended_schools', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->enum('type', ['Creche', 'Pré-escola', 'Ensino médio'])->nullable()->default('Creche');
            $table->string('school_grade', 64);
            $table->string('city', 64)->nullable();
            $table->string('administrative_department', 64)->nullable();
            $table->enum('network', ['Particular', 'Público', 'Particular com bolsa'])->nullable();
            $table->string('year')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attended_schools');
    }
}
