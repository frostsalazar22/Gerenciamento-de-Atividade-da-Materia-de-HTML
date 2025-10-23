@extends('layouts.app')

@section('content')
<h1>Criar Nova Criatura</h1>

<form method="POST" action="{{ route('items.store', 'criatura') }}">
    
    @csrf

    <h2>Identificação</h2>
    <label>Nome:</label> <input type="text" name="nome" required><br>
    <label>Tipo:</label> <input type="text" name="tipo"><br>
    <label>Alinhamento:</label> <input type="text" name="alinhamento"><br>
    <label>Nível de CD:</label> <input type="text" name="nivel_cd"><br>

    <h2>Características Físicas</h2>
    <label>Tamanho:</label> <input type="text" name="tamanho"><br>
    <label>Velocidade:</label> <input type="text" name="velocidade"><br>
    <label>Aparência:</label><br>
    <textarea name="aparencia" rows="2" cols="50"></textarea><br>
    <label>Localização Preferida:</label> <input type="text" name="localizacao_preferida"><br>

    <h2>Atributos</h2>
    <label>Força:</label> <input type="number" name="forca"><br>
    <label>Destreza:</label> <input type="number" name="destreza"><br>
    <label>Constituição:</label> <input type="number" name="constituicao"><br>
    <label>Inteligência:</label> <input type="number" name="inteligencia"><br>
    <label>Sabedoria:</label> <input type="number" name="sabedoria"><br>
    <label>Carisma:</label> <input type="number" name="carisma"><br>

    <h2>Combate</h2>
    <label>Pontos de Vida:</label> <input type="text" name="pontos_vida"><br>
    <label>Classe de Armadura:</label> <input type="number" name="classe_armadura"><br>

    <label>Ataques (JSON):</label><br>
    <textarea name="ataques" rows="2" cols="50">{}</textarea><br>

    <label>Habilidades Passivas (JSON):</label><br>
    <textarea name="habilidades_passivas" rows="2" cols="50">{}</textarea><br>

    <label>Habilidades Ativas (JSON):</label><br>
    <textarea name="habilidades_ativas" rows="2" cols="50">{}</textarea><br>

    <label>Magias Conhecidas (JSON):</label><br>
    <textarea name="magias_conhecidas" rows="2" cols="50">{}</textarea><br>

    <h2>Resistências e Vulnerabilidades</h2>
    <label>Resistências (JSON):</label><br>
    <textarea name="resistencias" rows="2" cols="50">{}</textarea><br>

    <label>Imunidades (JSON):</label><br>
    <textarea name="imunidades" rows="2" cols="50">{}</textarea><br>

    <label>Vulnerabilidades (JSON):</label><br>
    <textarea name="vulnerabilidades" rows="2" cols="50">{}</textarea><br>

    <h2>Comportamento e Lore</h2>
    <label>Origem:</label><br>
    <textarea name="origem" rows="2" cols="50"></textarea><br>

    <label>Motivações:</label><br>
    <textarea name="motivacoes" rows="2" cols="50"></textarea><br>

    <label>Mistérios:</label><br>
    <textarea name="misterios" rows="2" cols="50"></textarea><br>

    <label>Hábito Social:</label>
    <input type="text" name="habito_social"><br>

    <label>Interações com o Ambiente:</label><br>
    <textarea name="interacoes_ambiente" rows="2" cols="50"></textarea><br>

    <h2>Recompensas</h2>
    <label>Itens (JSON):</label><br>
    <textarea name="itens" rows="2" cols="50">{}</textarea><br>

    <label>Tesouro:</label><br>
    <textarea name="tesouro" rows="2" cols="50"></textarea><br>

    <label>Conhecimento:</label><br>
    <textarea name="conhecimento" rows="2" cols="50"></textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('items.index', 'criatura') }}">Cancelar</a>
@endsection
