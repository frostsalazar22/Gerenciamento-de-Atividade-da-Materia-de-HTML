<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestiário</title>
</head>
<body>
    <h1>Bestiário</h1>
    <a href="{{ route('restaurar') }}">Restaurar Dados</a>
    <form action="{{ route('salvar') }}" method="POST">
        @csrf
        <button type="submit">Salvar Dados</button>
    </form>

    <h2>Equipamentos</h2>
    <ul>
        @foreach($equipamentos as $equipamento)
            <li>{{ $equipamento->nome }} ({{ $equipamento->tipo }})</li>
        @endforeach
    </ul>

    <h2>Magias</h2>
    <ul>
        @foreach($magias as $magia)
            <li>{{ $magia->nome }} ({{ $magia->elemento }})</li>
        @endforeach
    </ul>
</body>
</html>
