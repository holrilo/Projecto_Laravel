<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            //$table->id();
            $table->engine = "InnoDB";

            $table->bigIncrements('id_gasto');
            $table->string('desc_gasto');
            $table->double('valor gasto');
            $table->dateTime('f_creacion_gasto');
            $table->dateTime('f_gasto');
            $table->bigInteger('id_tipo_gasto')->unsigned();

            $table->timestamps();
            $table->foreign('id_tipo_gasto')->references('id_tipo_gasto')->on('tipo_gastos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
