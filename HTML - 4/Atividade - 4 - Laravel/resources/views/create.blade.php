<!DOCTYPE html>
<html>
<head>
    <title>Novo Exame</title>
</head>
<body>
    <h1>Cadastrar Exame</h1>

    <p>
        <a href="{{ route('exames.index') }}">← Voltar para Lista de Exames</a>
    </p>

    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('exames.store') }}">
        @csrf
        <label>Paciente:</label>
        <input type="text" name="paciente" value="{{ old('paciente') }}"><br><br>

        <label>Número do Exame:</label>
        <input type="text" name="exame_id" value="{{ old('exame_id') }}"><br><br>

        <label>Tipo de Exame:</label>
        <select name="tipo_exame">
            <option value="">Selecione</option>
            <option value="Sequenciamento" {{ old('tipo_exame') == 'Sequenciamento' ? 'selected' : '' }}>Sequenciamento</option>
            <option value="PCR" {{ old('tipo_exame') == 'PCR' ? 'selected' : '' }}>PCR</option>
            <option value="Microarray" {{ old('tipo_exame') == 'Microarray' ? 'selected' : '' }}>Microarray</option>
        </select><br><br>

        <label>Data de Coleta:</label>
        <input type="date" name="data_coleta" value="{{ old('data_coleta') }}"><br><br>

        <label>Laudo:</label>
        <textarea name="laudo">{{ old('laudo') }}</textarea><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
