<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->enum('owner_type', ['persona', 'insurance'])->default('persona');

            $table->string('street', 64)->nullable();
            $table->string('street_extended', 64)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 4)->nullable()->default('DC');
            $table->string('zip', 16)->nullable();
            $table->string('country', 2)->nullable()->default('US');

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
        Schema::dropIfExists('addresses');
    }
}
