<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::all();
        return view("citas.index", compact("citas"));
    }

    public function editar(Citas $citas) {}
    public function crear(Request $request)
    {
        $validarDatos = $request->validate([
            'id_cliente' => 'required|integer|exists:clientes,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:programada,completada,cancelada',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $citas = Citas::create([
            'id_cliente' => $validarDatos['id_cliente'],
            'fecha' => $validarDatos['fecha'],
            'hora' => $validarDatos['hora'],
            'estado' => $validarDatos['estado'] ?? 'programada',
            'descripcion' => $validarDatos['descripcion'] ?? '',
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita creada con éxito');
    }
    public function eliminar($id)
    {
        $cita = Citas::findOrFail($id); // findOrFail es como un try-catch

        $cita->delete();

        $this->resetAutoIncrement();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada y contador ID reseteado con éxito.');
    }
    private function resetAutoIncrement()
    {
        // Verificar si la tabla citas está vacía
        $count = DB::table('citas')->count();

        // Si no hay registros en la tabla, reiniciar el auto-incremento a 1
        if ($count == 0) {
            DB::statement('ALTER TABLE citas AUTO_INCREMENT = 1');
        } else {
            $maxId = DB::table('citas')->max('id');
            DB::statement("ALTER TABLE citas AUTO_INCREMENT = " . ($maxId + 1));
        }
    }
}
