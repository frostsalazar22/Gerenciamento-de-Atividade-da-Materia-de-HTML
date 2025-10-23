<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Criar Reserva
        </h2>
    </x-slot>

    <form action="{{ route('reservas.store') }}" method="POST" class="p-6">
        @csrf
        <select name="sala_id" required>
            @foreach($salas as $sala)
                <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
            @endforeach
        </select>

        <input type="text" name="usuario" placeholder="Nome do usuário" required>
        <input type="date" name="data" required>
        <input type="time" name="hora" required>
        <button type="submit">Reservar</button>
    </form>
</x-app-layout>
