@extends('layouts.app')

@section('content')
<h1>Criar Nova Magia</h1>

<form method="POST" action="{{ route('items.store', 'magia') }}">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="escola">Escola:</label>
    <input type="text" name="escola"><br>

    <label for="nivel">Nível:</label>
    <input type="number" name="nivel"><br>

    <label for="classe_usuario">Classe Usuária:</label>
    <input type="text" name="classe_usuario"><br>

    <label for="verbais">Requer componentes verbais?</label>
    <input type="checkbox" name="verbais" value="1"><br>

    <label for="somaticos">Requer componentes somáticos?</label>
    <input type="checkbox" name="somaticos" value="1"><br>

    <label for="materiais">Materiais (JSON):</label><br>
    <textarea name="materiais" rows="2" cols="50">{}</textarea><br>

    <label for="area_efeito">Área de Efeito:</label>
    <input type="text" name="area_efeito"><br>

    <label for="duracao">Duração:</label>
    <input type="text" name="duracao"><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" rows="4" cols="60"></textarea><br>

    <label for="dano_beneficio">Dano/Benefício:</label>
    <input type="text" name="dano_beneficio"><br>

    <label for="alvo">Alvo:</label>
    <input type="text" name="alvo"><br>

    <label for="ritual">Pode ser ritual?</label>
    <input type="checkbox" name="ritual" value="1"><br>

    <label for="resistencia">Resistência (JSON):</label><br>
    <textarea name="resistencia" rows="2" cols="50">{}</textarea><br>

    <label for="interrupcoes">Interrupções:</label>
    <input type="text" name="interrupcoes"><br>

    <label for="aprimoramento">Aprimoramento:</label><br>
    <textarea name="aprimoramento" rows="3" cols="50"></textarea><br>

    <label for="custo_conjuracao">Custo de Conjuração:</label>
    <input type="text" name="custo_conjuracao"><br>

    <label for="falhas_criticas">Falhas Críticas:</label><br>
    <textarea name="falhas_criticas" rows="3" cols="50"></textarea><br>

    <label for="contraindicacoes">Contraindicações:</label><br>
    <textarea name="contraindicacoes" rows="3" cols="50"></textarea><br>

    <label for="variacoes_regionais">Variações Regionais:</label><br>
    <textarea name="variacoes_regionais" rows="3" cols="50"></textarea><br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem" accept="image/*"><br>

    <button type="submit">Salvar</button>
</form>


<a href="{{ route('items.index', 'magia') }}">Cancelar</a>
@endsection
