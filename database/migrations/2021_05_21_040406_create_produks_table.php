<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kategori_produk_id')->unsigned();
            $table->string('nama_produk');
            $table->text('description');
            $table->string('gambar');
            $table->integer('stok');
            $table->timestamps();
            
            $table->foreign('kategori_produk_id')->references('id')->on('kategori_produks');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
