<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes - Teste</title>
</head>
<body>
    <h1>Lista de Clientes (Teste)</h1>

    <a href="{{ route('clientes.create') }}">Novo Cliente</a>

    <table border="1" cellpadding="8" cellspacing="0">
      
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}">Editar</a> |
                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
