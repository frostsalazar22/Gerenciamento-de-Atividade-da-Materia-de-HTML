@extends('layouts.app')

@section('content')
<h1>Editar Equipamento - {{ $item->nome }}</h1>

<form method="POST" action="{{ route('items.update', ['equipamento', $item->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $item->nome) }}"><br>

    <label>Categoria:</label>
    <input type="text" name="categoria" value="{{ old('categoria', $item->categoria) }}"><br>

    <label>Tipo de Uso:</label>
    <input type="text" name="tipo_uso" value="{{ old('tipo_uso', $item->tipo_uso) }}"><br>

    <label>Classe Necessária:</label>
    <input type="text" name="classe_necessaria" value="{{ old('classe_necessaria', $item->classe_necessaria) }}"><br>

    <label>Requisitos (JSON):</label><br>
    <textarea name="requisitos" rows="2" cols="50">{{ old('requisitos', json_encode($item->requisitos)) }}</textarea><br>

    <label>Peso:</label>
    <input type="number" step="0.01" name="peso" value="{{ old('peso', $item->peso) }}"><br>

    <label>Local de Origem:</label>
    <input type="text" name="local_origem" value="{{ old('local_origem', $item->local_origem) }}"><br>

    <label>Bônus (JSON):</label><br>
    <textarea name="bonus" rows="2" cols="50">{{ old('bonus', json_encode($item->bonus)) }}</textarea><br>

    <label>Habilidades Passivas (JSON):</label><br>
    <textarea name="habilidades_passivas" rows="2" cols="50">{{ old('habilidades_passivas', json_encode($item->habilidades_passivas)) }}</textarea><br>

    <label>Habilidades Ativas (JSON):</label><br>
    <textarea name="habilidades_ativas" rows="2" cols="50">{{ old('habilidades_ativas', json_encode($item->habilidades_ativas)) }}</textarea><br>

    <label>Durabilidade:</label>
    <input type="number" name="durabilidade" value="{{ old('durabilidade', $item->durabilidade) }}"><br>

    <label>Afinidade Elemental:</label>
    <input type="text" name="afinidade_elemental" value="{{ old('afinidade_elemental', $item->afinidade_elemental) }}"><br>

    <label>Encantamentos (JSON):</label><br>
    <textarea name="encantamentos" rows="2" cols="50">{{ old('encantamentos', json_encode($item->encantamentos)) }}</textarea><br>

    <label>História:</label><br>
    <textarea name="historia" rows="3" cols="50">{{ old('historia', $item->historia) }}</textarea><br>

    <label>Curiosidades:</label><br>
    <textarea name="curiosidades" rows="3" cols="50">{{ old('curiosidades', $item->curiosidades) }}</textarea><br>

    <label>Conexões:</label><br>
    <textarea name="conexoes" rows="3" cols="50">{{ old('conexoes', $item->conexoes) }}</textarea><br>

    <label>Preço:</label>
    <input type="number" name="preco" value="{{ old('preco', $item->preco) }}"><br>

    <label>Raridade:</label>
    <input type="text" name="raridade" value="{{ old('raridade', $item->raridade) }}"><br>

    <label>Restrição de Uso:</label><br>
    <textarea name="restricao_uso" rows="3" cols="50">{{ old('restricao_uso', $item->restricao_uso) }}</textarea><br>

    <label>Evoluções:</label><br>
    <textarea name="evolucoes" rows="3" cols="50">{{ old('evolucoes', $item->evolucoes) }}</textarea><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('items.show', ['equipamento', $item->id]) }}">Cancelar</a>
@endsection
