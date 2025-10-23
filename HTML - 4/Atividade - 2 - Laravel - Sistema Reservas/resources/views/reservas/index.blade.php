<h1>Reservas</h1>
<a href="{{ route('reservas.create') }}">Nova Reserva</a>
<table border="1">
    <tr>
        <th>Sala</th>
        <th>Usuário</th>
        <th>Data</th>
        <th>Hora</th>
    </tr>
    @foreach ($reservas as $reserva)
    <tr>
        <td>{{ $reserva->sala->nome }}</td>
        <td>{{ $reserva->usuario }}</td>
        <td>{{ $reserva->data }}</td>
        <td>{{ $reserva->hora }}</td>
    </tr>
    @endforeach
</table>
