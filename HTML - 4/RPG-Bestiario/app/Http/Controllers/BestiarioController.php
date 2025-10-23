<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipamento;
use App\Models\Magia;

class BestiarioController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        $magias = Magia::all();
        return view('bestiario.index', compact('equipamentos', 'magias'));
    }

    public function salvar(Request $request)
    {
        $dados = [
            'equipamentos' => Equipamento::all()->toArray(),
            'magias' => Magia::all()->toArray(),
        ];
        Storage::put('data/dados.json', json_encode($dados, JSON_PRETTY_PRINT));
        return redirect()->route('home')->with('success', 'Dados salvos!');
    }

    public function restaurar()
    {
        if (!Storage::exists('data/dados.json')) {
            return redirect()->route('home')->with('error', 'Nenhum dado para restaurar.');
        }
        $dados = json_decode(Storage::get('data/dados.json'), true);
        foreach ($dados['equipamentos'] as $equipamento) {
            Equipamento::updateOrCreate(['nome' => $equipamento['nome']], $equipamento);
        }
        foreach ($dados['magias'] as $magia) {
            Magia::updateOrCreate(['nome' => $magia['nome']], $magia);
        }
        return redirect()->route('home')->with('success', 'Dados restaurados!');
    }
}
