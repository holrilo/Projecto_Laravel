<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img_Producto extends Model
{
    use HasFactory;
    protected $table = 'img_producto';
    protected $primaryKey = 'id_img_producto';

/*     public function producto()
    {
        return $this->belongsTo('App\Models\Img_Producto','id_img_producto','id_img_producto');
    } */
}
