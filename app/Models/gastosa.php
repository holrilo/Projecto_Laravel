<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gastosa extends Model
{
    use HasFactory;
    
    protected $table = "gastosa";
    protected $primaryKey = "id_gasto";

    public function tipo_gastos(){
        return $this->belongsTo('App\Models\tipo_gasto', 'id_tipo_gasto', 'id_tipo_gasto');
    }

     public function tipo_ingresos(){
        return $this->belongsTo('App\Models\Ingreso', 'id_ingreso' , 'id_ingreso');
    } 
}
