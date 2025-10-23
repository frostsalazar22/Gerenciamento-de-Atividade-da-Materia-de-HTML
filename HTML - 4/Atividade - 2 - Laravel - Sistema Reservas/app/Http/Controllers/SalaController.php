<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'capacidade' => 'required|integer',
        ]);

        Sala::create($request->all());
        return redirect()->route('salas.index');
    }
}
