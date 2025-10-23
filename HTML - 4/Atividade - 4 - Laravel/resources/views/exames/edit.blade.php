<!DOCTYPE html>
<html>
<head>
    <title>Editar Exame</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

</head>
<body>
    <h1>Editar Exame</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('exames.update', $exame->id) }}">
        @csrf
        @method('PUT')

        <label>Paciente:</label>
        <input type="text" name="paciente" value="{{ old('paciente', $exame->paciente) }}"><br><br>

        <label>Número do Exame:</label>
        <input type="text" name="exame_id" value="{{ old('exame_id', $exame->exame_id) }}"><br><br>

        <label>Tipo de Exame:</label>
        <select name="tipo_exame">
            <option value="">Selecione</option>
            <option value="Sequenciamento" {{ $exame->tipo_exame == 'Sequenciamento' ? 'selected' : '' }}>Sequenciamento</option>
            <option value="PCR" {{ $exame->tipo_exame == 'PCR' ? 'selected' : '' }}>PCR</option>
            <option value="Microarray" {{ $exame->tipo_exame == 'Microarray' ? 'selected' : '' }}>Microarray</option>
        </select><br><br>

        <label>Data de Coleta:</label>
        <input type="date" name="data_coleta" value="{{ old('data_coleta', $exame->data_coleta) }}"><br><br>

        <label>Laudo:</label>
        <textarea name="laudo">{{ old('laudo', $exame->laudo) }}</textarea><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
