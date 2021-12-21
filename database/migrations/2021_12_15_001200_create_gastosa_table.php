<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastosa', function (Blueprint $table) {
            $table->engine = "InnoDB";  

            $table->bigIncrements('id_gasto');
            $table->string('desc_gasto');
            $table->double('valor_gasto');
            $table->dateTime('f_creacion_gasto');
            $table->dateTime('f_gasto');
            $table->string('obs_gasto')->nullable();
            $table->integer('id_ingreso')->nullable();
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
        Schema::dropIfExists('gastosa');
    }
}
