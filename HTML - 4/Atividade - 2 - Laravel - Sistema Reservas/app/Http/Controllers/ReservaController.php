<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('sala')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('reservas.create', compact('salas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'usuario' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required|string',
        ]);

        Reserva::create($request->all());
        return redirect()->route('reservas.index');
    }
}
