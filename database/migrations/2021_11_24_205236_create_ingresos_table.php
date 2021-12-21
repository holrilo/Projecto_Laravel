<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            /* $table->id(); */
            $table->engine = "InnoDB";

            $table->bigIncrements('id_ingreso');
            $table->string('desc_ingreso');
            $table->double('valor_ingreso');
            $table->dateTime('f_creacion_ingreso');
            $table->dateTime('f_ingreso');
            $table->string('obs_ingreso')->nullable();
            $table->bigInteger('id_tipo_ingreso')->unsigned();

            $table->timestamps();
            $table->foreign('id_tipo_ingreso')->references('id_tipo_ingreso')->on('tipo_ingresos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
