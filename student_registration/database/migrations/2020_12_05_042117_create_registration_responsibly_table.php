<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationResponsiblyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_responsibly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id');
            $table->boolean('current')->default(1);
            $table->foreignId('responsibly_id');
            $table->timestamps();

            $table->foreign('responsibly_id')->references('id')->on('responsiblies');
            $table->foreign('registration_id')->references('id')->on('registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_responsibly');
    }
}
