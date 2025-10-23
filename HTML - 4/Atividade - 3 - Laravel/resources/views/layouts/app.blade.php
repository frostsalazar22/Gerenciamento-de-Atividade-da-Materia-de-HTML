<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Minha Aplicação')</title>
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
