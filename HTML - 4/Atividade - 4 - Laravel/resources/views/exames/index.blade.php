<!DOCTYPE html>
<html>
<head>
    <title>Lista de Exames</title>
    <link rel="stylesheet" href="tabela.css">
</head>
<body>
    <h1>Exames Cadastrados</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="{{ route('exames.create') }}">+ Novo Exame</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Exame ID</th>
                <th>Tipo</th>
                <th>Data Coleta</th>
                <th>Laudo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exames as $exame)
                <tr>
                    <td>{{ $exame->id }}</td>
                    <td>{{ $exame->paciente }}</td>
                    <td>{{ $exame->exame_id }}</td>
                    <td>{{ $exame->tipo_exame }}</td>
                    <td>{{ $exame->data_coleta }}</td>
                    <td>{{ $exame->laudo }}</td>
                    <td>
                        <a href="{{ route('exames.edit', $exame->id) }}">Editar</a>
                        <form action="{{ route('exames.destroy', $exame->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
