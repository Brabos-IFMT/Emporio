<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if(session('erro'))
        <p style="color: red">{{ session('erro') }}</p>
    @endif

    @if(session('sucesso'))
        <p style="color: green">{{ session('sucesso') }}</p>
    @endif

    <form method="POST" action="{{ route('login.usuario') }}">
        @csrf
        <label for="login">Email:</label>
        <input type="email" id="login" name="login" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Ainda não tem conta? <a href="{{ route('registro.form') }}">Registrar</a></p>
</body>
</html>
