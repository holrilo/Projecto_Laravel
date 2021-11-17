<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";
    protected $primaryKey = "id_cliente";

    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'id_estado', 'id_estado');
    }

    public function tipo_id(){
        return $this->belongsTo('App\Models\tipo_id', 'id_tipo_id', 'id_tipo_id');
    }
}
