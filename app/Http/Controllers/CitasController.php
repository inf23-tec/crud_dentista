<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\Dentista;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::all();
        $dentistas = Dentista::all();
        $pacientes = Paciente::all();

        return view("dashboard", compact("citas","pacientes","dentistas"));
    }
    public function crear(Request $request)
    {
        $citas = Citas::all();
        $dentistas = Dentista::all();
        $pacientes = Paciente::all();
        $id_paciente = $request->input('id');

        return view("citas.crear.index",[
            'id' => $id_paciente,
            'cita' => $citas,
            'paciente' => $pacientes,
        ], compact('dentistas'));
    }

    public function almacenar(Request $request, $id)
    {
        $validated = $request->validate([
            'id_dentista' => 'required|exists:dentistas,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:programada,completada,cancelada',
        ]);

        Citas::create([
            'id_cliente' => $id,
            'id_dentista' => $validated['id_dentista'],
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'estado' => $validated['estado'] ?? 'programada',
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
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
