<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksionsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksions_details', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id')->unsigned();
            $table->integer('transaksion_id')->unsigned();
            $table->string('stok');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks');
            $table->foreign('transaksion_id')->references('id')->on('transaksions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksions_details');
    }
}
