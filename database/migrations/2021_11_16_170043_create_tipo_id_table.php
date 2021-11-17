<?php

use App\Models\tipo_id;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_id', function (Blueprint $table) {
            $table->engine= "InnoDB";
            //$table->id();
            $table->bigIncrements('id_tipo_id');
            $table->string('tipo_id');
            $table->string('desc_tipo_id');

            $table->timestamps();
        });

        $datos = array(
            [
                'tipo_id' => 'RC',
                'desc_tipo_id' => 'Registro civil de nacimiento'
            ],
            [
                'tipo_id' => 'TI',
                'desc_tipo_id' => 'Tarjeta de identidad'
            ],
            [
                'tipo_id' => 'CC',
                'desc_tipo_id' => 'Cédula de ciudadanía'
            ],
            [
                'tipo_id' => 'TE',
                'desc_tipo_id' => 'Tarjeta de extranjería'
            ],
            [
                'tipo_id' => 'CE',
                'desc_tipo_id' => 'Cédula de extranjería'
            ],
            [
                'tipo_id' => 'NIT',
                'desc_tipo_id' => 'NIT'
            ],
            [
                'tipo_id' => 'PS',
                'desc_tipo_id' => 'Pasaporte'
            ],
            [
                'tipo_id' => 'TDE',
                'desc_tipo_id' => 'Tipo de documento extranjero'
            ],
         );
 
         foreach($datos as $dato){
             $tipoid = new tipo_id();
             $tipoid->tipo_id = $dato['tipo_id'];
             $tipoid->desc_tipo_id = $dato['desc_tipo_id'];
             $tipoid->save();
         }  
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_id');
    }
}
