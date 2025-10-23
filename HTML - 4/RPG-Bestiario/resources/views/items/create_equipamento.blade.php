@extends('layouts.app')

@section('content')
<h1>Criar Novo Equipamento</h1>

<form method="POST" action="{{ route('items.store', 'equipamento') }}">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria"><br>

    <label for="tipo_uso">Tipo de Uso:</label>
    <input type="text" name="tipo_uso"><br>

    <label for="classe_necessaria">Classe Necessária:</label>
    <input type="text" name="classe_necessaria"><br>

    <label for="requisitos">Requisitos (JSON):</label><br>
    <textarea name="requisitos" rows="2" cols="50">{}</textarea><br>

    <label for="peso">Peso:</label>
    <input type="number" step="0.01" name="peso"><br>

    <label for="local_origem">Local de Origem:</label>
    <input type="text" name="local_origem"><br>

    <label for="bonus">Bonus (JSON):</label><br>
    <textarea name="bonus" rows="2" cols="50">{}</textarea><br>

    <label for="habilidades_passivas">Habilidades Passivas (JSON):</label><br>
    <textarea name="habilidades_passivas" rows="2" cols="50">{}</textarea><br>

    <label for="habilidades_ativas">Habilidades Ativas (JSON):</label><br>
    <textarea name="habilidades_ativas" rows="2" cols="50">{}</textarea><br>

    <label for="durabilidade">Durabilidade:</label>
    <input type="number" name="durabilidade"><br>

    <label for="afinidade_elemental">Afinidade Elemental:</label>
    <input type="text" name="afinidade_elemental"><br>

    <label for="encantamentos">Encantamentos (JSON):</label><br>
    <textarea name="encantamentos" rows="2" cols="50">{}</textarea><br>

    <label for="historia">História:</label><br>
    <textarea name="historia" rows="3" cols="50"></textarea><br>

    <label for="curiosidades">Curiosidades:</label><br>
    <textarea name="curiosidades" rows="2" cols="50"></textarea><br>

    <label for="conexoes">Conexões:</label><br>
    <textarea name="conexoes" rows="2" cols="50"></textarea><br>

    <label for="preco">Preço:</label>
    <input type="number" name="preco"><br>

    <label for="raridade">Raridade:</label>
    <input type="text" name="raridade"><br>

    <label for="restricao_uso">Restrição de Uso:</label><br>
    <textarea name="restricao_uso" rows="2" cols="50"></textarea><br>

    <label for="evolucoes">Evoluções:</label><br>
    <textarea name="evolucoes" rows="2" cols="50"></textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('items.index', 'equipamento') }}">Cancelar</a>
@endsection
