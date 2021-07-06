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

            $table->string('driver_license', 32)->nullable();

            $table->integer('family_size')->nullable();
            $table->string('marital', 32)->nullable();
            $table->longText('marital_details')->nullable();

            $table->string('language', 2)->default(config('app.locale'))->nullable();
            $table->string('ethnicity', 32)->nullable();
            $table->string('race', 32)->nullable();

            $table->string('company_name', 64)->nullable();
            $table->string('company_position', 128)->nullable();

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
