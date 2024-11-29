<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dentista extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'especialidad'];
    public $timestamps = false; // Desactiva el updated_at y created_at
}
