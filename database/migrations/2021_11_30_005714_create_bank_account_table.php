<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string("flyerKey",50);
            $table->string("entityCode",10);
            $table->string("entityStatus",10)->default('A');
            $table->string("countryCode", 10);
            $table->string("bankCode", 10);
            $table->string("accountTypeCode",10);
            $table->string("accountNumber", 20);
            $table->string("clientName", 100);
            $table->string("clientEmail", 250);
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
        Schema::dropIfExists('bank_accounts');
    }
}
