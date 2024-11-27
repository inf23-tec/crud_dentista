<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $pacientes = Paciente::all();
        return view('paciente.index', compact('pacientes'));
    }
    public function crearIndex()
    {
        $pacientes = Paciente::all();
        return view("paciente.crear.index", compact("pacientes"));
    }

    public function crear(Request $request)
    {
        $validarDatos = $request->validate([
            'fecha_nacimiento' => 'required|date',
            'nombre' => 'required|string',
            'numero_telefono' => 'required|string',
        ]);

        $pacientes = Paciente::create([
            'fecha_nacimiento' => $validarDatos['fecha_nacimiento'],
            'nombre' => $validarDatos['nombre'],
            'numero_telefono' => $validarDatos['numero_telefono'],
        ]);

        return redirect()->route('paciente.index')->with('success', 'Usuario creado con éxito');
    }
    public function eliminar($id)
    {
        $paciente = Paciente::findOrFail($id); // findOrFail es como un try-catch

        $paciente->delete();

        $this->resetAutoIncrement();

        return redirect()->route('paciente.index')->with('success', 'Paciente eliminado y contador ID reseteado con éxito.');
    }
    private function resetAutoIncrement()
    {
        // Verificar si la tabla pacientes está vacía
        $count = DB::table('pacientes')->count();

        // Si no hay registros en la tabla, reiniciar el auto-incremento a 1
        if ($count == 0) {
            DB::statement('ALTER TABLE pacientes AUTO_INCREMENT = 1');
        } else {
            $maxId = DB::table('pacientes')->max('id');
            DB::statement("ALTER TABLE pacientes AUTO_INCREMENT = " . ($maxId + 1));
        }
    }
}
