<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->enum('owner_type', ['user', 'patient', 'contact', 'employer', 'subscriber', 'doctor'])->default('patient');

            $table->string('first_name', 32);
            $table->string('middle_name', 32)->nullable();
            $table->string('last_name', 32);

            $table->date('birthdate');
            $table->longText('profile_photo')->nullable();

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
        Schema::dropIfExists('personas');
    }
}
