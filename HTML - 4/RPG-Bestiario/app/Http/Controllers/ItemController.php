<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magia;
use App\Models\Personagem;
use App\Models\Criatura;
use App\Models\Equipamento;

class ItemController extends Controller
{
    private $models = [
        'magia' => Magia::class,
        'personagem' => Personagem::class,
        'criatura' => Criatura::class,
        'equipamento' => Equipamento::class,
    ];

    public function home(Request $request)
    {
        $tipoFiltro = $request->get('tipo');

        $dataQuery = collect($this->models)
            ->filter(function ($_, $tipo) use ($tipoFiltro) {
                return !$tipoFiltro || $tipoFiltro === $tipo;
            })
            ->flatMap(function ($model, $tipo) {
                return $model::latest()->get()->map(function ($item) use ($tipo) {
                    $item->tipo_interno = $tipo;
                    return $item;
                });
            });

        $perPage = 8;
        $currentPage = $request->get('page', 1);
        $pagedData = $dataQuery->slice(($currentPage - 1) * $perPage, $perPage)->values();

        if ($request->ajax()) {
            return view('partials.cards', ['items' => $pagedData])->render();
        }

        return view('home', [
            'items' => $pagedData,
            'hasMore' => $dataQuery->count() > $currentPage * $perPage,
            'tipos' => array_keys($this->models),
            'filtroAtivo' => $tipoFiltro,
        ]);
    }

    public function index($tipo)
    {
        $this->validateTipo($tipo);
        $model = $this->models[$tipo];
        $items = $model::paginate(15);
        return view('items.index', compact('items', 'tipo'));
    }

    public function create($tipo)
    {
        $this->validateTipo($tipo);

        $viewName = "items.create_{$tipo}";

        if (!view()->exists($viewName)) {
            abort(404, "Formulário de criação para {$tipo} não encontrado.");
        }

        return view($viewName, compact('tipo'));
    }

    public function store(Request $request, $tipo)
    {
        $this->validateTipo($tipo);
        $model = $this->models[$tipo];

        $data = $request->all();

        // Campos JSON específicos por tipo
        $camposJsonPorTipo = [
            'magia' => ['materiais', 'resistencia'],
            'equipamento' => ['requisitos', 'bonus', 'habilidades_passivas', 'habilidades_ativas', 'encantamentos'],
            'criatura' => [
                'ataques', 'habilidades_passivas', 'habilidades_ativas',
                'magias_conhecidas', 'resistencias', 'imunidades', 'vulnerabilidades', 'itens'
            ],
            'personagem' => [
                'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas',
                'slots_magia', 'magias_preparadas', 'talentos_proficiências', 'equipamentos_basicos',
                'itens_utilizaveis', 'recursos', 'ataques_magias', 'resistencias',
                'fraquezas', 'testes_resistencia'
            ],
        ];

        // Decodificar os campos JSON, se presentes
        if (isset($camposJsonPorTipo[$tipo])) {
            foreach ($camposJsonPorTipo[$tipo] as $campo) {
                if ($request->filled($campo)) {
                    $data[$campo] = json_decode($request->input($campo), true);
                }
            }
        }

        // Checkboxes booleanos específicos do tipo "magia"
        if ($tipo === 'magia') {
            $data['verbais'] = $request->has('verbais');
            $data['somaticos'] = $request->has('somaticos');
            $data['ritual'] = $request->has('ritual');
        }

        // Criação do item com dados tratados
        $item = $model::create($data);

        // Redireciona para a home com mensagem de sucesso
        return redirect()->route('home')->with('success', ucfirst($tipo) . ' criado com sucesso!');
    }


    public function show($tipo, $id)
    {
        $this->validateTipo($tipo);
        $model = $this->models[$tipo];
        $item = $model::findOrFail($id);
        return view('items.show', compact('item', 'tipo'));
    }

    public function edit($tipo, $id)
    {
        $this->validateTipo($tipo);
        $model = $this->models[$tipo];
        $item = $model::findOrFail($id);

        // View dinâmica
        $view = "items.edit_{$tipo}";

        if (!view()->exists($view)) {
            abort(404, "A view de edição para '{$tipo}' não existe.");
        }

        return view($view, compact('item', 'tipo'));
    }


    public function update(Request $request, $tipo, $id)
    {
        $this->validateTipo($tipo);
        $model = $this->models[$tipo];
        $item = $model::findOrFail($id);

        $data = $request->all();

        $camposJsonPorTipo = [
            'magia' => ['materiais', 'resistencia'],
            'equipamento' => ['requisitos', 'bonus', 'habilidades_passivas', 'habilidades_ativas', 'encantamentos'],
            'criatura' => [
                'ataques', 'habilidades_passivas', 'habilidades_ativas',
                'magias_conhecidas', 'resistencias', 'imunidades', 'vulnerabilidades', 'itens'
            ],
            'personagem' => [
                'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas',
                'slots_magia', 'magias_preparadas', 'talentos_proficiências', 'equipamentos_basicos',
                'itens_utilizaveis', 'recursos', 'ataques_magias', 'resistencias',
                'fraquezas', 'testes_resistencia'
            ],
        ];

        if (isset($camposJsonPorTipo[$tipo])) {
            foreach ($camposJsonPorTipo[$tipo] as $campo) {
                if ($request->filled($campo)) {
                    $data[$campo] = json_decode($request->input($campo), true);
                }
            }
        }

        if ($tipo === 'magia') {
            $data['verbais'] = $request->has('verbais');
            $data['somaticos'] = $request->has('somaticos');
            $data['ritual'] = $request->has('ritual');
        }

        $item->update($data);

        return redirect()->route('home')->with('success', ucfirst($tipo) . ' atualizado com sucesso!');
    }


    private function validateTipo($tipo)
    {
        if (!array_key_exists($tipo, $this->models)) {
            abort(404, 'Tipo de item inválido.');
        }
    }

    public function destroy($tipo, $id)
{
    $this->validateTipo($tipo);
    $model = $this->models[$tipo];

    $item = $model::findOrFail($id);
    $item->delete();

    return redirect()->route('home')->with('success', ucfirst($tipo) . ' excluído com sucesso!');
}

}
