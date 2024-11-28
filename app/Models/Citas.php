<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_cliente', 'id_dentista', 'fecha', 'hora', 'estado'];
    public $timestamps = false; // Desactiva el updated_at y created_at
    public function paciente()
    {
        return $this->belongsTo( Paciente::class, 'id_cliente', 'id');
    }
}
