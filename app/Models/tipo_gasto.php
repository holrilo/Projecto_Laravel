<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_gasto extends Model
{
    use HasFactory;

    protected $table = "tipo_gastos";
    protected $primarykey = "id_tipo_gasto";
}
