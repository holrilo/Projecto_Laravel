<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\once;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->bigIncrements('id_producto');
            $table->string('cod_producto');
            $table->string('desc_producto');
            $table->string('stock_producto');
            $table->double('valor_producto');
            $table->dateTime('fecha_creacion');
            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_ctg_producto')->unsigned();
            //$table->bigInteger('id_usuario')->unsigned();
            
            $table->timestamps();
            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_ctg_producto')->references('id_ctg_producto')->on('categoria');
            //$table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
