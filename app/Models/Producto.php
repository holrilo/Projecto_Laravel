<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "producto";
    protected $primaryKey = 'id_producto';

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria', 'id_ctg_producto' , 'id_ctg_producto' );
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'id_estado' , 'id_estado');
    }

    public function img_producto()
    {
        return $this->belongsTo('App\Models\Img_Producto','id_producto','id_producto');
    }

}
