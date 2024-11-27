<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_cliente', 'fecha', 'hora', 'estado', 'descripcion', 'creado_el', 'actualizado_el'];
    public $timestamps = false; // Desactiva el updated_at y created_at
}
