

create.blade.php(<!DOCTYPE html>
<html>
<head>
    <title>Novo Exame</title>
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
</head>
<body>
    <h1>Cadastrar Exame</h1>

    <p><a href="{{ route('exames.index') }}">← Voltar para Lista de Exames</a></p>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
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
        <input type="text" name="paciente" value="{{ old('paciente') }}">

        <label>Número do Exame:</label>
        <input type="text" name="exame_id" value="{{ old('exame_id') }}">

        <label>Tipo de Exame:</label>
        <select name="tipo_exame">
            <option value="">Selecione</option>
            <option value="Sequenciamento" {{ old('tipo_exame') == 'Sequenciamento' ? 'selected' : '' }}>Sequenciamento</option>
            <option value="PCR" {{ old('tipo_exame') == 'PCR' ? 'selected' : '' }}>PCR</option>
            <option value="Microarray" {{ old('tipo_exame') == 'Microarray' ? 'selected' : '' }}>Microarray</option>
        </select>

        <label>Data de Coleta:</label>
        <input type="date" name="data_coleta" value="{{ old('data_coleta') }}">

        <label>Laudo:</label>
        <textarea name="laudo">{{ old('laudo') }}</textarea>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
)
edit.blade.php(<!DOCTYPE html>
<html>
<head>
    <title>Editar Exame</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <h1>Editar Exame</h1>

    <p><a href="{{ route('exames.index') }}">← Voltar para Lista</a></p>

    @if ($errors->any())
        <div class="error">
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
        <input type="text" name="paciente" value="{{ old('paciente', $exame->paciente) }}">

        <label>Número do Exame:</label>
        <input type="text" name="exame_id" value="{{ old('exame_id', $exame->exame_id) }}">

        <label>Tipo de Exame:</label>
        <select name="tipo_exame">
            <option value="">Selecione</option>
            <option value="Sequenciamento" {{ $exame->tipo_exame == 'Sequenciamento' ? 'selected' : '' }}>Sequenciamento</option>
            <option value="PCR" {{ $exame->tipo_exame == 'PCR' ? 'selected' : '' }}>PCR</option>
            <option value="Microarray" {{ $exame->tipo_exame == 'Microarray' ? 'selected' : '' }}>Microarray</option>
        </select>

        <label>Data de Coleta:</label>
        <input type="date" name="data_coleta" value="{{ old('data_coleta', $exame->data_coleta) }}">

        <label>Laudo:</label>
        <textarea name="laudo">{{ old('laudo', $exame->laudo) }}</textarea>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
)

cadastro.css(body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f3f3f3;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

h1 {
    margin-bottom: 20px;
    color: #333;
}

form {
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    width: 350px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-top: 6px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    resize: vertical;
    height: 80px;
}

button {
    width: 100%;
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

a {
    color: #007BFF;
    text-decoration: none;
    margin-bottom: 20px;
    display: inline-block;
}

a:hover {
    text-decoration: underline;
}

.success, .error {
    font-weight: bold;
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 6px;
    width: 350px;
    text-align: center;
}

.success {
    background-color: #d4edda;
    color: #155724;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
}
)