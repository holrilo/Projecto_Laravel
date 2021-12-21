<?php

use App\Models\tipo_gasto;
use App\Models\Tipo_ingreso;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ingresos', function (Blueprint $table) {
            /* $table->id(); */

            $table->engine ="InnoDB";

            $table->bigIncrements('id_tipo_ingreso');
            $table->string('desc_tipo_ingreso');

            $table->timestamps();
        });

        $datos = array(
            [
                'desc_tipo_ingreso' => 'Ingresos Fijos'
            ],
            [
                'desc_tipo_ingreso' => 'Ingresos Variables'
            ]
        );

        foreach ($datos as $dato)
        {
            $tipo_ingreso = new Tipo_ingreso();
            $tipo_ingreso->desc_tipo_ingreso = $dato['desc_tipo_ingreso'];
            $tipo_ingreso->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_ingresos');
    }
}
