@extends('layouts.app')

@section('content')
<h1>Editar Magia - {{ $item->nome }}</h1>

<form method="POST" action="{{ route('items.update', ['magia', $item->id]) }}">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $item->nome) }}"><br>

    <label>Escola:</label>
    <input type="text" name="escola" value="{{ old('escola', $item->escola) }}"><br>

    <label>Nível:</label>
    <input type="number" name="nivel" value="{{ old('nivel', $item->nivel) }}"><br>

    <label>Classe Usuária:</label>
    <input type="text" name="classe_usuario" value="{{ old('classe_usuario', $item->classe_usuario) }}"><br>

    <label>Verbais:</label>
    <input type="checkbox" name="verbais" {{ $item->verbais ? 'checked' : '' }}><br>

    <label>Somáticos:</label>
    <input type="checkbox" name="somaticos" {{ $item->somaticos ? 'checked' : '' }}><br>

    <label>Materiais (JSON):</label><br>
    <textarea name="materiais" rows="2" cols="50">{{ old('materiais', json_encode($item->materiais)) }}</textarea><br>

    <label>Área de Efeito:</label>
    <input type="text" name="area_efeito" value="{{ old('area_efeito', $item->area_efeito) }}"><br>

    <label>Duração:</label>
    <input type="text" name="duracao" value="{{ old('duracao', $item->duracao) }}"><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" rows="4" cols="60">{{ old('descricao', $item->descricao) }}</textarea><br>

    <label>Dano/Benefício:</label>
    <input type="text" name="dano_beneficio" value="{{ old('dano_beneficio', $item->dano_beneficio) }}"><br>

    <label>Alvo:</label>
    <input type="text" name="alvo" value="{{ old('alvo', $item->alvo) }}"><br>

    <label>Ritual:</label>
    <input type="checkbox" name="ritual" {{ $item->ritual ? 'checked' : '' }}><br>

    <label>Resistência (JSON):</label><br>
    <textarea name="resistencia" rows="2" cols="50">{{ old('resistencia', json_encode($item->resistencia)) }}</textarea><br>

    <label>Interrupções:</label>
    <input type="text" name="interrupcoes" value="{{ old('interrupcoes', $item->interrupcoes) }}"><br>

    <label>Aprimoramento:</label><br>
    <textarea name="aprimoramento" rows="2" cols="50">{{ old('aprimoramento', $item->aprimoramento) }}</textarea><br>

    <label>Custo de Conjuração:</label>
    <input type="text" name="custo_conjuracao" value="{{ old('custo_conjuracao', $item->custo_conjuracao) }}"><br>

    <label>Falhas Críticas:</label><br>
    <textarea name="falhas_criticas" rows="2" cols="50">{{ old('falhas_criticas', $item->falhas_criticas) }}</textarea><br>

    <label>Contraindicações:</label><br>
    <textarea name="contraindicacoes" rows="2" cols="50">{{ old('contraindicacoes', $item->contraindicacoes) }}</textarea><br>

    <label>Variações Regionais:</label><br>
    <textarea name="variacoes_regionais" rows="2" cols="50">{{ old('variacoes_regionais', $item->variacoes_regionais) }}</textarea><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('items.show', ['magia', $item->id]) }}">Cancelar</a>
@endsection
