<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationVaccineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_vaccine', function (Blueprint $table) {
            $table->id();
            $table->string('expiration',16);
            $table->foreignId('vaccine_id')->constrained('vaccines');
            $table->foreignId('registration_id')->constrained('registrations');
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
        Schema::dropIfExists('registration_vaccine');
    }
}
