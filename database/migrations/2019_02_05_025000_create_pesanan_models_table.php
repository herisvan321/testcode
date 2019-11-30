<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pesanan');
            $table->string('no_meja');
            $table->string('nama_pelanggan');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('total');
            $table->string('status');
            $table->string('id_menu');
            $table->string('id_user');
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
        Schema::dropIfExists('pesanan_models');
    }
}
