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

            $table->string('first_name', 32)->index();
            $table->string('middle_name', 32)->nullable();
            $table->string('last_name', 32)->index();

            $table->date('birthdate')->index();
            $table->string('gender', 32)->nullable();

            $table->string('social_security', 32)->index();
            $table->date('decease_date')->nullable();
            $table->longText('decease_reason')->nullable();

            $table->enum('contact_type', ['father', 'mother', 'husband', 'spouse', 'son', 'daughter', 'guardian', 'relative', 'other'])->nullable();

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
