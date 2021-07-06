<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('insID');

            $table->boolean('active')->default(true);

            $table->string('name', 128)->index();
            $table->string('marketing_name', 128)->nullable();
            $table->string('parent_organization', 128)->nullable();
            $table->string('typeof_organization', 32)->nullable();

            $table->date('contract_effective_date')->nullable();
            $table->date('contract_termination_date')->nullable();

            $table->string('payer_type', 32)->nullable();
            $table->string('payer_id', 16)->nullable();
            $table->string('eligbility_payer_id', 16)->nullable();

            $table->string('x12_partner', 16)->nullable();
            $table->string('eligbility_x12_partner', 16)->nullable();

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
        Schema::dropIfExists('companies');
    }
}
