<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::all();
        return view("citas.index", compact("citas"));
    }
}
