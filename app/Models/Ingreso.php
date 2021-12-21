<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $primaryKey = "id_ingreso";

    public function tipo_ingresos(){
        return $this->belongsTo('App\Models\Tipo_ingreso', 'id_tipo_ingreso' , 'id_tipo_ingreso');
    }

    public function scopeDescripcion($query, $descripcion){
        if ($descripcion) {
            # code...
            return $query->orWhere('desc_ingreso', 'LIKE', "%$descripcion%");
        }
    }
}
