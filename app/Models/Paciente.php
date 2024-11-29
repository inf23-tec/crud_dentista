<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'numero_telefono', 'fecha_nacimiento'];

        public $timestamps = false; // Desactiva el updated_at y created_at
    public function citas()
    {
        return $this->hasMany(Citas::class, 'id_cliente', 'id');
    }
}
