<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->enum('owner_type', ['persona', 'insurance'])->default('persona');

            $table->enum('phone_type', ['home', 'cellphone', 'work', 'emergency', 'relative', 'other'])->nullable();
            $table->integer('intl_code')->nullable()->default('00');
            $table->integer('area_code')->nullable()->default('000');
            $table->integer('prefix')->nullable()->default('000');
            $table->integer('line')->nullable()->default('0000');

            $table->integer('extension')->nullable();

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
        Schema::dropIfExists('phones');
    }
}
