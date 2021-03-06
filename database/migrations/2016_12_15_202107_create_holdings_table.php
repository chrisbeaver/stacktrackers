<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('piece_id')->unsigned()->nullable()->default(null);
            $table->integer('mint_id')->unsigned()->nullable()->default(null);
            $table->integer('primary_img_id')->unsigned()->nullable()->defult(null);
            $table->string('name', 60);
            $table->float('weight', 6,4);           // single unit weight
            $table->enum('weight_unit', ['ounces', 'grams']);
            $table->string('mint', 40);
            $table->integer('finess');              // .999 for fine etc...
            $table->integer('purchase_price');      // purchase price in USD
            $table->integer('quantity');            // quantity purchased
            $table->integer('year')->nullable();    // if applicable (coin)
            $table->date('purchase_date');          // date of purchase
            $table->enum('purchase_currency', ['usd'])->default('usd');
            $table->boolean('anonymous')->default(false);
            $table->enum('visibility', ['private', 'public'])->default('public');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holdings');
    }
}
