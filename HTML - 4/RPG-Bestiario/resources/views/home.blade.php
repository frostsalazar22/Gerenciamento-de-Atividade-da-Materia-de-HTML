@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>
    .filter-bar {
        text-align: center;
        margin-bottom: 20px;
    }

    .filter-bar select {
        padding: 6px;
        border-radius: 5px;
        font-size: 16px;
    }

    #load-more {
        background-color: #00bfff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

{{-- Seção de criação --}}
<div class="utilitarios-section">
    <h2 class="utilitarios-title">UTILITÁRIOS</h2>
    <div class="app-icons">
        {{-- (sem alteração nos cards de criação) --}}
        <div class="app-card">
            <a href="{{ route('items.create', 'personagem') }}">
                <img src="/assets/img/icons/character.png" alt="Personagens">
                <span>Personagens</span>
            </a>
        </div>
        <div class="app-card">
            <a href="{{ route('items.create', 'equipamento') }}">
                <img src="/assets/img/icons/equipment.png" alt="Equipamentos">
                <span>Equipamentos</span>
            </a>
        </div>
        <div class="app-card">
            <a href="{{ route('items.create', 'criatura') }}">
                <img src="/assets/img/icons/monster.png" alt="Criaturas">
                <span>Criaturas</span>
            </a>
        </div>
        <div class="app-card">
            <a href="{{ route('items.create', 'magia') }}">
                <img src="/assets/img/icons/spellbook.png" alt="Magias">
                <span>Magias</span>
            </a>
        </div>
    </div>
</div>

<div class="divider"></div>

<div class="cards-section">
    <h2 class="cards-title">Itens Recentes</h2>

    <div class="filter-bar">
        <form id="filtro-form">
            <select name="tipo" id="tipo-select">
                <option value="">Todos os tipos</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo }}" {{ $filtroAtivo === $tipo ? 'selected' : '' }}>
                        {{ ucfirst($tipo) }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div id="cards" class="cards-container">
        @include('partials.cards', ['items' => $items])
    </div>

    @if($hasMore)
        <div style="text-align:center;">
            <button id="load-more" data-page="2">Carregar mais</button>
        </div>
    @endif
</div>

<script>
    document.getElementById('tipo-select').addEventListener('change', function () {
        document.getElementById('filtro-form').submit();
    });

    const loadMoreBtn = document.getElementById('load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            const page = this.dataset.page;
            const tipo = document.getElementById('tipo-select').value;

            fetch(`/?page=${page}&tipo=${tipo}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('cards').insertAdjacentHTML('beforeend', html);
                this.dataset.page = parseInt(page) + 1;
            })
            .catch(err => console.error(err));
        });
    }
</script>

@endsection
