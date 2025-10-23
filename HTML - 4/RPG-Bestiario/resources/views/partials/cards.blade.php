@foreach($items as $item)
    <a href="{{ route('items.show', [$item->tipo_interno, $item->id]) }}" style="text-decoration: none;">
        <div class="item-card">
            <div class="item-card-title">{{ $item->nome ?? 'Sem nome' }}</div>

            @if(!empty($item->imagem))
                <img src="{{ asset('storage/' . $item->imagem) }}" alt="Imagem" class="item-card-img">
            @else
                <img src="/assets/img/icons/default.png" alt="Sem imagem" class="item-card-img">
            @endif

            <div class="item-card-banner">{{ strtoupper($item->tipo_interno) }}</div>
        </div>
    </a>
@endforeach
