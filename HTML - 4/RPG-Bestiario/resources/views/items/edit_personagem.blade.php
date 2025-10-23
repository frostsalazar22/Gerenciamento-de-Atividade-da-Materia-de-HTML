@extends('layouts.app')

@section('content')
<h1>Editar Personagem - {{ $item->nome }}</h1>

<form method="POST" action="{{ route('items.update', ['personagem', $item->id]) }}">
    @csrf
    @method('PUT')

    <h2>Identificação</h2>
    <label>Nome:</label> <input type="text" name="nome" value="{{ old('nome', $item->nome) }}"><br>
    <label>Raça:</label> <input type="text" name="raca" value="{{ old('raca', $item->raca) }}"><br>
    <label>Classe:</label> <input type="text" name="classe" value="{{ old('classe', $item->classe) }}"><br>
    <label>Alinhamento:</label> <input type="text" name="alinhamento" value="{{ old('alinhamento', $item->alinhamento) }}"><br>
    <label>Idade:</label> <input type="number" name="idade" value="{{ old('idade', $item->idade) }}"><br>
    <label>Gênero:</label> <input type="text" name="genero" value="{{ old('genero', $item->genero) }}"><br>
    <label>Altura:</label> <input type="text" name="altura" value="{{ old('altura', $item->altura) }}"><br>
    <label>Peso:</label> <input type="text" name="peso" value="{{ old('peso', $item->peso) }}"><br>
    <label>Aparência:</label><br>
    <textarea name="aparencia" rows="2">{{ old('aparencia', $item->aparencia) }}</textarea><br>

    <h2>Atributos</h2>
    <label>Força:</label> <input type="number" name="forca" value="{{ old('forca', $item->forca) }}"><br>
    <label>Destreza:</label> <input type="number" name="destreza" value="{{ old('destreza', $item->destreza) }}"><br>
    <label>Constituição:</label> <input type="number" name="constituicao" value="{{ old('constituicao', $item->constituicao) }}"><br>
    <label>Inteligência:</label> <input type="number" name="inteligencia" value="{{ old('inteligencia', $item->inteligencia) }}"><br>
    <label>Sabedoria:</label> <input type="number" name="sabedoria" value="{{ old('sabedoria', $item->sabedoria) }}"><br>
    <label>Carisma:</label> <input type="number" name="carisma" value="{{ old('carisma', $item->carisma) }}"><br>
    <label>Pontos de Vida Máx:</label> <input type="number" name="pontos_vida_max" value="{{ old('pontos_vida_max', $item->pontos_vida_max) }}"><br>
    <label>Pontos de Vida Atual:</label> <input type="number" name="pontos_vida_atual" value="{{ old('pontos_vida_atual', $item->pontos_vida_atual) }}"><br>
    <label>Classe de Armadura:</label> <input type="number" name="classe_armadura" value="{{ old('classe_armadura', $item->classe_armadura) }}"><br>
    <label>Iniciativa:</label> <input type="number" name="iniciativa" value="{{ old('iniciativa', $item->iniciativa) }}"><br>
    <label>Velocidade:</label> <input type="text" name="velocidade" value="{{ old('velocidade', $item->velocidade) }}"><br>

    <h2>Habilidades e Magias (JSON)</h2>
    <label>Habilidades Passivas:</label><br>
    <textarea name="habilidades_passivas" rows="2">{{ old('habilidades_passivas', json_encode($item->habilidades_passivas)) }}</textarea><br>

    <label>Habilidades Ativas:</label><br>
    <textarea name="habilidades_ativas" rows="2">{{ old('habilidades_ativas', json_encode($item->habilidades_ativas)) }}</textarea><br>

    <label>Magias Conhecidas:</label><br>
    <textarea name="magias_conhecidas" rows="2">{{ old('magias_conhecidas', json_encode($item->magias_conhecidas)) }}</textarea><br>

    <label>Slots de Magia:</label><br>
    <textarea name="slots_magia" rows="2">{{ old('slots_magia', json_encode($item->slots_magia)) }}</textarea><br>

    <label>Magias Preparadas:</label><br>
    <textarea name="magias_preparadas" rows="2">{{ old('magias_preparadas', json_encode($item->magias_preparadas)) }}</textarea><br>

    <label>Talentos/Proficiências:</label><br>
    <textarea name="talentos_proficiências" rows="2">{{ old('talentos_proficiências', json_encode($item->talentos_proficiências)) }}</textarea><br>

    <h2>Inventário (JSON)</h2>
    <label>Equipamentos Básicos:</label><br>
    <textarea name="equipamentos_basicos" rows="2">{{ old('equipamentos_basicos', json_encode($item->equipamentos_basicos)) }}</textarea><br>

    <label>Itens Utilizáveis:</label><br>
    <textarea name="itens_utilizaveis" rows="2">{{ old('itens_utilizaveis', json_encode($item->itens_utilizaveis)) }}</textarea><br>

    <label>Recursos:</label><br>
    <textarea name="recursos" rows="2">{{ old('recursos', json_encode($item->recursos)) }}</textarea><br>

    <h2>Personalidade</h2>
    <label>Motivações:</label><br>
    <textarea name="motivacoes" rows="2">{{ old('motivacoes', $item->motivacoes) }}</textarea><br>

    <label>Medos/Fraquezas:</label><br>
    <textarea name="medos_fraquezas" rows="2">{{ old('medos_fraquezas', $item->medos_fraquezas) }}</textarea><br>

    <label>Traços de Personalidade:</label><br>
    <textarea name="traços_personalidade" rows="2">{{ old('traços_personalidade', $item->traços_personalidade) }}</textarea><br>

    <label>Ideais:</label><br>
    <textarea name="ideais" rows="2">{{ old('ideais', $item->ideais) }}</textarea><br>

    <label>Vínculos:</label><br>
    <textarea name="vinculos" rows="2">{{ old('vinculos', $item->vinculos) }}</textarea><br>

    <label>Defeitos:</label><br>
    <textarea name="defeitos" rows="2">{{ old('defeitos', $item->defeitos) }}</textarea><br>

    <h2>História</h2>
    <label>Background:</label><br>
    <textarea name="background" rows="2">{{ old('background', $item->background) }}</textarea><br>

    <label>Eventos Marcantes:</label><br>
    <textarea name="eventos_marcantes" rows="2">{{ old('eventos_marcantes', $item->eventos_marcantes) }}</textarea><br>

    <label>Conexões:</label><br>
    <textarea name="conexoes" rows="2">{{ old('conexoes', $item->conexoes) }}</textarea><br>

    <label>Segredos:</label><br>
    <textarea name="segredos" rows="2">{{ old('segredos', $item->segredos) }}</textarea><br>

    <h2>Combate (JSON)</h2>
    <label>Ataques e Magias:</label><br>
    <textarea name="ataques_magias" rows="2">{{ old('ataques_magias', json_encode($item->ataques_magias)) }}</textarea><br>

    <label>Resistências:</label><br>
    <textarea name="resistencias" rows="2">{{ old('resistencias', json_encode($item->resistencias)) }}</textarea><br>

    <label>Fraquezas:</label><br>
    <textarea name="fraquezas" rows="2">{{ old('fraquezas', json_encode($item->fraquezas)) }}</textarea><br>

    <label>Testes de Resistência:</label><br>
    <textarea name="testes_resistencia" rows="2">{{ old('testes_resistencia', json_encode($item->testes_resistencia)) }}</textarea><br>

    <h2>Frases de Efeito</h2>
    <textarea name="frases_efeito" rows="2">{{ old('frases_efeito', $item->frases_efeito) }}</textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('items.show', ['personagem', $item->id]) }}">Cancelar</a>
@endsection
