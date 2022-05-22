<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephones', function (Blueprint $table) {
            $table->id();
            $table->string("flyerKey",50);
            $table->string("entityCode",10);
            $table->string("entityStatus",10)->default('A');
            $table->string("nationalPrefix",3);
            $table->string("digits",15);
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
        Schema::dropIfExists('telephones');
    }
}
