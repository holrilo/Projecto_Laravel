<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->bigIncrements('id_cliente');
            $table->string('num_id_cliente');
            $table->string('nom_cliente_1');
            $table->string('nom_cliente_2');
            $table->string('ape_cliente_1');
            $table->string('ape_cliente_2');
            $table->string('correo_cliente');
            $table->string('tel_cliente');
            $table->dateTime('fecha_creacion');
            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_tipo_id')->unsigned();
            
            $table->timestamps();
            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_tipo_id')->references('id_tipo_id')->on('tipo_id');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
