<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->bigIncrements('id_ctg_producto');
            $table->string('desc_categoria');
            $table->bigInteger('id_estado')->unsigned();

            $table->timestamps();
            $table->foreign('id_estado')->references('id_estado')->on('estado')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
