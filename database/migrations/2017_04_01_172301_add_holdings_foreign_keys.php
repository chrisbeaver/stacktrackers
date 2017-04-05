<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHoldingsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->foreign('mint_id')->references('id')->on('mints');
            $table->foreign('piece_id')->references('id')->on('pieces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->dropForeign(['mint_id']);
            $table->dropForeign(['piece_id']);
        });
    }
}
