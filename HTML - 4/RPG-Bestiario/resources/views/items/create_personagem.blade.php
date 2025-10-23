@extends('layouts.app')

@section('content')
<h1>Criar Novo Personagem</h1>

<form method="POST" action="{{ route('items.store', 'personagem') }}">
    @csrf

    <h2>Identificação</h2>
    <label>Nome:</label> <input type="text" name="nome" required><br>
    <label>Raça:</label> <input type="text" name="raca"><br>
    <label>Classe:</label> <input type="text" name="classe"><br>
    <label>Alinhamento:</label> <input type="text" name="alinhamento"><br>
    <label>Idade:</label> <input type="number" name="idade"><br>
    <label>Gênero:</label> <input type="text" name="genero"><br>
    <label>Altura:</label> <input type="text" name="altura"><br>
    <label>Peso:</label> <input type="text" name="peso"><br>
    <label>Aparência:</label><br>
    <textarea name="aparencia" rows="2" cols="50"></textarea><br>

    <h2>Atributos</h2>
    <label>Força:</label> <input type="number" name="forca"><br>
    <label>Destreza:</label> <input type="number" name="destreza"><br>
    <label>Constituição:</label> <input type="number" name="constituicao"><br>
    <label>Inteligência:</label> <input type="number" name="inteligencia"><br>
    <label>Sabedoria:</label> <input type="number" name="sabedoria"><br>
    <label>Carisma:</label> <input type="number" name="carisma"><br>
    <label>Pontos de Vida Máx:</label> <input type="number" name="pontos_vida_max"><br>
    <label>Pontos de Vida Atual:</label> <input type="number" name="pontos_vida_atual"><br>
    <label>Classe de Armadura:</label> <input type="number" name="classe_armadura"><br>
    <label>Iniciativa:</label> <input type="number" name="iniciativa"><br>
    <label>Velocidade:</label> <input type="text" name="velocidade"><br>

    <h2>Habilidades e Magias (JSON)</h2>
    <label>Habilidades Passivas:</label><br>
    <textarea name="habilidades_passivas" rows="2" cols="50">{}</textarea><br>

    <label>Habilidades Ativas:</label><br>
    <textarea name="habilidades_ativas" rows="2" cols="50">{}</textarea><br>

    <label>Magias Conhecidas:</label><br>
    <textarea name="magias_conhecidas" rows="2" cols="50">{}</textarea><br>

    <label>Slots de Magia:</label><br>
    <textarea name="slots_magia" rows="2" cols="50">{}</textarea><br>

    <label>Magias Preparadas:</label><br>
    <textarea name="magias_preparadas" rows="2" cols="50">{}</textarea><br>

    <label>Talentos/Proficiências:</label><br>
    <textarea name="talentos_proficiências" rows="2" cols="50">{}</textarea><br>

    <h2>Inventário (JSON)</h2>
    <label>Equipamentos Básicos:</label><br>
    <textarea name="equipamentos_basicos" rows="2" cols="50">{}</textarea><br>

    <label>Itens Utilizáveis:</label><br>
    <textarea name="itens_utilizaveis" rows="2" cols="50">{}</textarea><br>

    <label>Recursos:</label><br>
    <textarea name="recursos" rows="2" cols="50">{}</textarea><br>

    <h2>Personalidade</h2>
    <label>Motivações:</label><br>
    <textarea name="motivacoes" rows="2" cols="50"></textarea><br>

    <label>Medos/Fraquezas:</label><br>
    <textarea name="medos_fraquezas" rows="2" cols="50"></textarea><br>

    <label>Traços de Personalidade:</label><br>
    <textarea name="traços_personalidade" rows="2" cols="50"></textarea><br>

    <label>Ideais:</label><br>
    <textarea name="ideais" rows="2" cols="50"></textarea><br>

    <label>Vínculos:</label><br>
    <textarea name="vinculos" rows="2" cols="50"></textarea><br>

    <label>Defeitos:</label><br>
    <textarea name="defeitos" rows="2" cols="50"></textarea><br>

    <h2>História</h2>
    <label>Background:</label><br>
    <textarea name="background" rows="2" cols="50"></textarea><br>

    <label>Eventos Marcantes:</label><br>
    <textarea name="eventos_marcantes" rows="2" cols="50"></textarea><br>

    <label>Conexões:</label><br>
    <textarea name="conexoes" rows="2" cols="50"></textarea><br>

    <label>Segredos:</label><br>
    <textarea name="segredos" rows="2" cols="50"></textarea><br>

    <h2>Combate (JSON)</h2>
    <label>Ataques e Magias:</label><br>
    <textarea name="ataques_magias" rows="2" cols="50">{}</textarea><br>

    <label>Resistências:</label><br>
    <textarea name="resistencias" rows="2" cols="50">{}</textarea><br>

    <label>Fraquezas:</label><br>
    <textarea name="fraquezas" rows="2" cols="50">{}</textarea><br>

    <label>Testes de Resistência:</label><br>
    <textarea name="testes_resistencia" rows="2" cols="50">{}</textarea><br>

    <h2>Frases de Efeito</h2>
    <textarea name="frases_efeito" rows="2" cols="50"></textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('items.index', 'personagem') }}">Cancelar</a>
@endsection
