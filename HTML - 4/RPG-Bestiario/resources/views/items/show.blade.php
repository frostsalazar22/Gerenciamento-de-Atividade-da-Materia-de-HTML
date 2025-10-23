@extends('layouts.app')

@section('content')
<h1>Detalhes de {{ ucfirst($tipo) }}</h1>

<div style="display: flex; gap: 40px; flex-wrap: wrap;">
    {{-- Dados do item --}}
    <div style="flex: 2;">
        <table border="1" cellpadding="5">
            @foreach ($item->toArray() as $campo => $valor)
                <tr>
                    <th>{{ ucfirst(str_replace('_', ' ', $campo)) }}</th>
                    <td>
                        @if (is_array($valor))
                            <pre>{{ json_encode($valor, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        @else
                            {{ $valor }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- Ações --}}
    <div style="flex: 1; min-width: 200px;">
        <a href="{{ route('items.edit', [$tipo, $item->id]) }}" style="display:block; margin-bottom: 15px;">
            <button style="padding: 10px 20px; background: #00bfff; color: #fff; border: none; border-radius: 5px;">Editar</button>
        </a>

        <form method="POST" action="{{ route('items.destroy', [$tipo, $item->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este item?')" style="padding: 10px 20px; background: #ff4444; color: #fff; border: none; border-radius: 5px;">
                Excluir
            </button>
        </form>
    </div>
</div>

<br>
<a href="{{ route('items.index', $tipo) }}">← Voltar para lista</a>
@endsection
