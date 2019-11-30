<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_models', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->string('nama_menu');
            $table->integer('type')->unsigned();
            $table->integer('status')->usingned();
            $table->string('harga');
            $table->string('foto_menu');
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
        Schema::dropIfExists('menu_models');
    }
}
