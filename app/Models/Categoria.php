<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $id_ctg_producto
 * @property $desc_categoria
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categoria";
    protected $primaryKey = 'id_ctg_producto';



   /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto' , 'id_ctg_producto' , 'id_ctg_producto');
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'id_estado', 'id_estado');
    }

}
