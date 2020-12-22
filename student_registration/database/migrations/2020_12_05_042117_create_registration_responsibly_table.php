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
            $table->boolean('current')->default(1);
            $table->foreignId('registration_id')->constrained('registrations');
            $table->foreignId('responsibly_id')->constrained('responsiblies');
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
        Schema::dropIfExists('registration_responsibly');
    }
}
