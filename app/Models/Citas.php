<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $fillable = ['id_cliente', 'nombre', 'telefono', 'fecha'];
}
