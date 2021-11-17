<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_producto', function (Blueprint $table) {
            $table->engine= "InnoDB";

            $table->bigIncrements('id_img_producto');
            $table->string('descr_img');
            $table->bigInteger('id_producto')->unsigned();

            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('producto');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_producto');
    }
}
