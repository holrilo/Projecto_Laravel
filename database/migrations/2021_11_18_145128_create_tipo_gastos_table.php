<?php

use App\Models\tipo_gasto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_gastos', function (Blueprint $table) {
            //$table->id();

            $table->engine = "InnoDB";

            $table->bigIncrements('id_tipo_gasto');
            $table->string('desc_tipo_gasto');

            $table->timestamps();
        });

        $datos = array(
            [
                'desc_tipo_gasto' => 'Gastos Fijos'
            ],
            [
                'desc_tipo_gasto' => 'Gastos Variables'
            ],
            [
                'desc_tipo_gasto' => 'Gastos inesperados'
            ],
        );

        foreach ($datos as $dato) {
            $tipo_gasto = new tipo_gasto();
            $tipo_gasto->desc_tipo_gasto = $dato['desc_tipo_gasto'];
            $tipo_gasto->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_gastos');
    }
}
