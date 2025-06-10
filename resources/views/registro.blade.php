<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
</head>
<body>
    <h2>Registro de Usuário</h2>

    @if(session('sucesso'))
        <p style="color:green">{{ session('sucesso') }}</p>
    @endif

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('registrar.usuario') }}">
        @csrf
        <label>Nome:</label>
        <input type="text" name="Nome" required><br>

        <label>Email:</label>
        <input type="email" name="Login" required><br>

        <label>Senha:</label>
        <input type="password" name="Senha" required><br>

        <button type="submit">Registrar</button>
    </form>

    <a href="{{ route('login.form') }}">Já tem conta? Login</a>
</body>
</html>
