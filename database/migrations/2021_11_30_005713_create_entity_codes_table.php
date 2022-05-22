<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_codes', function (Blueprint $table) {
            $table->string("entity",50);
            $table->string("property",50);
            $table->string("entityStatus",10)->default('A');
            $table->string("code",20);
            $table->string("description",100);
            $table->timestamps();
            
            $table->primary(["entity", "property", "code"]);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_codes');
    }
}
