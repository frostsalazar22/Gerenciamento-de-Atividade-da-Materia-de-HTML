@extends('layouts.app')

@section('content')
<h1>Lista de {{ ucfirst($tipo) }}</h1>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->nome ?? 'Sem nome' }}</td>
            <td>
                <a href="{{ route('items.show', [$tipo, $item->id]) }}">Ver</a> |
                <a href="{{ route('items.edit', [$tipo, $item->id]) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $items->links() }}
@endsection
