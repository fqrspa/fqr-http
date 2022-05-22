<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogHttpServer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loghttpserver', function (Blueprint $table) {
            $table->id();
            $table->string("flyerKey",50)->nullable();
            $table->string("entityCreationDate",8)->default(date("Ymd"));
            $table->string("entityCreationHours",6)->default(date("His"));
            $table->string("actionRequest",100)->nullable();;
            $table->string("phpSelf",512)->nullable();
            $table->string("httpReferer",512)->nullable();
            $table->string("remoteAddr", 50)->nullable();
            $table->string("httpClientIp", 50)->nullable();
            $table->string("httpUserAgent")->nullable();
            $table->string("httpUserAgentName",512)->nullable();
            $table->index(["flyerKey"]);
            $table->index(["flyerKey","actionRequest"]);
            $table->index(["entityCreationDate","actionRequest"]);
            $table->index(["flyerKey","entityCreationDate"]);
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
        Schema::dropIfExists('loghttpserver');
    }
}
