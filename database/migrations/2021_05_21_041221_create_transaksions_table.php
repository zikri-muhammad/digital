<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksions', function (Blueprint $table) {
            
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('type_transaksi_id')->unsigned();
            $table->string('name');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_transaksi_id')->references('id')->on('type_transaksions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksions');
    }
}
