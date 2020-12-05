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
            $table->string('name',64);
            $table->enum('type', ['creche', 'pre escola','ensino médio']);
            $table->string('school_grade',64);
            $table->string('city',64);
            $table->string('administrative_department',64);
            $table->enum('network',['particular', 'publica', 'particular com bolsa']);
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
