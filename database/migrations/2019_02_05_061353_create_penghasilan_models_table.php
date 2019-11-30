<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenghasilanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghasilan_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_meja');
            $table->string('nama_pelanggan');
            $table->string('total');
            $table->string('bayar');
            $table->string('kembalian');
            $table->string('id_user');
            $table->string('id_pesanan');
            $table->date('tanggal');
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
        Schema::dropIfExists('penghasilan_models');
    }
}
