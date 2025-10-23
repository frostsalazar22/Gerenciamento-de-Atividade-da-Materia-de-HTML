@extends('layouts.app')

@section('content')
<h1>Editar Criatura - {{ $item->nome }}</h1>

<form method="POST" action="{{ route('items.update', ['criatura', $item->id]) }}">
    @csrf
    @method('PUT')

    <h2>Identificação</h2>
    <label>Nome:</label> <input type="text" name="nome" value="{{ old('nome', $item->nome) }}"><br>
    <label>Tipo:</label> <input type="text" name="tipo" value="{{ old('tipo', $item->tipo) }}"><br>
    <label>Alinhamento:</label> <input type="text" name="alinhamento" value="{{ old('alinhamento', $item->alinhamento) }}"><br>
    <label>Nível de CD:</label> <input type="text" name="nivel_cd" value="{{ old('nivel_cd', $item->nivel_cd) }}"><br>

    <h2>Características Físicas</h2>
    <label>Tamanho:</label> <input type="text" name="tamanho" value="{{ old('tamanho', $item->tamanho) }}"><br>
    <label>Velocidade:</label> <input type="text" name="velocidade" value="{{ old('velocidade', $item->velocidade) }}"><br>
    <label>Aparência:</label><br>
    <textarea name="aparencia" rows="2" cols="50">{{ old('aparencia', $item->aparencia) }}</textarea><br>
    <label>Localização Preferida:</label> <input type="text" name="localizacao_preferida" value="{{ old('localizacao_preferida', $item->localizacao_preferida) }}"><br>

    <h2>Atributos</h2>
    <label>Força:</label> <input type="number" name="forca" value="{{ old('forca', $item->forca) }}"><br>
    <label>Destreza:</label> <input type="number" name="destreza" value="{{ old('destreza', $item->destreza) }}"><br>
    <label>Constituição:</label> <input type="number" name="constituicao" value="{{ old('constituicao', $item->constituicao) }}"><br>
    <label>Inteligência:</label> <input type="number" name="inteligencia" value="{{ old('inteligencia', $item->inteligencia) }}"><br>
    <label>Sabedoria:</label> <input type="number" name="sabedoria" value="{{ old('sabedoria', $item->sabedoria) }}"><br>
    <label>Carisma:</label> <input type="number" name="carisma" value="{{ old('carisma', $item->carisma) }}"><br>

    <h2>Combate</h2>
    <label>Pontos de Vida:</label> <input type="text" name="pontos_vida" value="{{ old('pontos_vida', $item->pontos_vida) }}"><br>
    <label>Classe de Armadura:</label> <input type="number" name="classe_armadura" value="{{ old('classe_armadura', $item->classe_armadura) }}"><br>

    <label>Ataques (JSON):</label><br>
    <textarea name="ataques" rows="2" cols="50">{{ old('ataques', json_encode($item->ataques)) }}</textarea><br>

    <label>Habilidades Passivas (JSON):</label><br>
    <textarea name="habilidades_passivas" rows="2" cols="50">{{ old('habilidades_passivas', json_encode($item->habilidades_passivas)) }}</textarea><br>

    <label>Habilidades Ativas (JSON):</label><br>
    <textarea name="habilidades_ativas" rows="2" cols="50">{{ old('habilidades_ativas', json_encode($item->habilidades_ativas)) }}</textarea><br>

    <label>Magias Conhecidas (JSON):</label><br>
    <textarea name="magias_conhecidas" rows="2" cols="50">{{ old('magias_conhecidas', json_encode($item->magias_conhecidas)) }}</textarea><br>

    <h2>Resistências e Vulnerabilidades</h2>
    <label>Resistências (JSON):</label><br>
    <textarea name="resistencias" rows="2" cols="50">{{ old('resistencias', json_encode($item->resistencias)) }}</textarea><br>

    <label>Imunidades (JSON):</label><br>
    <textarea name="imunidades" rows="2" cols="50">{{ old('imunidades', json_encode($item->imunidades)) }}</textarea><br>

    <label>Vulnerabilidades (JSON):</label><br>
    <textarea name="vulnerabilidades" rows="2" cols="50">{{ old('vulnerabilidades', json_encode($item->vulnerabilidades)) }}</textarea><br>

    <h2>Comportamento e Lore</h2>
    <label>Origem:</label><br>
    <textarea name="origem" rows="2" cols="50">{{ old('origem', $item->origem) }}</textarea><br>

    <label>Motivações:</label><br>
    <textarea name="motivacoes" rows="2" cols="50">{{ old('motivacoes', $item->motivacoes) }}</textarea><br>

    <label>Mistérios:</label><br>
    <textarea name="misterios" rows="2" cols="50">{{ old('misterios', $item->misterios) }}</textarea><br>

    <label>Hábito Social:</label>
    <input type="text" name="habito_social" value="{{ old('habito_social', $item->habito_social) }}"><br>

    <label>Interações com o Ambiente:</label><br>
    <textarea name="interacoes_ambiente" rows="2" cols="50">{{ old('interacoes_ambiente', $item->interacoes_ambiente) }}</textarea><br>

    <h2>Recompensas</h2>
    <label>Itens (JSON):</label><br>
    <textarea name="itens" rows="2" cols="50">{{ old('itens', json_encode($item->itens)) }}</textarea><br>

    <label>Tesouro:</label><br>
    <textarea name="tesouro" rows="2" cols="50">{{ old('tesouro', $item->tesouro) }}</textarea><br>

    <label>Conhecimento:</label><br>
    <textarea name="conhecimento" rows="2" cols="50">{{ old('conhecimento', $item->conhecimento) }}</textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('items.show', ['criatura', $item->id]) }}">Cancelar</a>
@endsection
