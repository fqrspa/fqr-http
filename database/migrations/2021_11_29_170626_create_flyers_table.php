<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyers', function (Blueprint $table) {
            $table->string('email', 250)->unique();
            $table->string('flyerKey', 50)->unique();
            $table->string("entityStatus",10)->default('A');
            $table->date("entityCreationDate")->default(date("Y-m-d"));
            $table->string("contractStatus",10)->default('PA');
            $table->string('marketName',100);
            $table->string('marketArea', 100);
            $table->date('expirationDate')->default(lastDateOfMonth());
            $table->timestamps();
            $table->primary(["email"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flyers');
    }
}
