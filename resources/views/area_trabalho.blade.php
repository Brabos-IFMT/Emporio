<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área de Trabalho</title>
</head>
<body>
    <h2>Bem-vindo à Área de Trabalho</h2>

    @if(session('usuario'))
        <p>Olá, {{ session('usuario')->Nome }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    @endif
</body>
</html>
