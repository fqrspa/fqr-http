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
            $table->string('flyerKey', 50);            
            $table->string("entityCode",10);
            $table->string("entityStatus",10)->default('A');
            $table->string("marketActivity",100)->nullable(true);
            $table->string("countryCode",10)->nullable(true);
            $table->string("city",100)->nullable(true);
            $table->string("street",100)->nullable(true);
            $table->string("informationAdditional",100);
            $table->timestamps();

            $table->foreign('flyerKey')->references('flyerKey')->on('flyers');
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
