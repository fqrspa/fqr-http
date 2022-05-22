<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenToFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flyers', function (Blueprint $table) {
            //
            $table->string('tokenId', 50)->unique()->after('flyerKey')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flyers', function (Blueprint $table) {
            //
            $table->dropColumn('tokenId');
        });
    }
}
