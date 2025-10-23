<h1>Cadastrar Nova Sala</h1>
<form method="POST" action="{{ route('salas.store') }}">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome">
    <br>
    <label>Capacidade:</label>
    <input type="number" name="capacidade">
    <br>
    <button type="submit">Salvar</button>
</form>
