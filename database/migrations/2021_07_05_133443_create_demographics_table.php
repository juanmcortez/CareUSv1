<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemographicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->enum('owner_type', ['persona', 'insurance'])->default('persona');

            $table->string('family_size', 16)->nullable();
            $table->string('marital', 32)->nullable();
            $table->string('marital_details', 128)->nullable();

            $table->string('language', 2)->default(config('app.locale'));
            $table->string('ethnicity', 16)->nullable();
            $table->string('race', 16)->nullable();

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
        Schema::dropIfExists('demographics');
    }
}
