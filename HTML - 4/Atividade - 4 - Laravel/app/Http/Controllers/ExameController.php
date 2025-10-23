<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exame;

class ExameController extends Controller
{
    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'paciente' => 'required|max:100',
            'exame_id' => 'required|alpha_num|unique:exames,exame_id',
            'tipo_exame' => 'required|in:Sequenciamento,PCR,Microarray',
            'data_coleta' => 'required|date|before_or_equal:today',
            'laudo' => 'nullable|max:500',
        ], [
            'paciente.required' => 'O nome do paciente é obrigatório.',
            'paciente.max' => 'O nome do paciente não pode passar de 100 caracteres.',
            'exame_id.required' => 'O número do exame é obrigatório.',
            'exame_id.alpha_num' => 'O número do exame deve conter apenas letras e números.',
            'exame_id.unique' => 'Esse número de exame já foi registrado.',
            'tipo_exame.required' => 'O tipo de exame é obrigatório.',
            'tipo_exame.in' => 'Tipo de exame inválido.',
            'data_coleta.required' => 'A data de coleta é obrigatória.',
            'data_coleta.before_or_equal' => 'A data de coleta não pode ser no futuro.',
            'laudo.max' => 'O laudo pode ter no máximo 500 caracteres.',
        ]);

        Exame::create($request->all());

        return redirect('/exames/criar')->with('success', 'Exame cadastrado com sucesso!');
    }
    
    public function index()
    {
        $exames = Exame::all();
        return view('exames.index', compact('exames'));
    }

    public function edit(Exame $exame)
    {
        return view('exames.edit', compact('exame'));
    }

    public function update(Request $request, Exame $exame)
    {
        $request->validate([
            'paciente' => 'required|max:100',
            'exame_id' => 'required|alpha_num|unique:exames,exame_id,' . $exame->id,
            'tipo_exame' => 'required|in:Sequenciamento,PCR,Microarray',
            'data_coleta' => 'required|date|before_or_equal:today',
            'laudo' => 'nullable|max:500',
        ]);

        $exame->update($request->all());

        return redirect()->route('exames.index')->with('success', 'Exame atualizado com sucesso!');
    }

    public function destroy(Exame $exame)
    {
        $exame->delete();
        return redirect()->route('exames.index')->with('success', 'Exame excluído com sucesso!');
    }

}
