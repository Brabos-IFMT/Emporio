
<h2>Vendas</h2>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Cliente</th>
            <th>Usuário</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>    
    <tbody>
        @foreach ($vendas as $venda)
        <tr>
            <td>{{ $venda->id_venda }}</td>
            <td>{{ $venda->descricao }}</td>
            <td>{{ $venda->cliente->nome ?? '' }}</td>
            <td>{{ $venda->usuario->nome ?? '' }}</td>
            <td>R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
            <td>
                
                <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir venda?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

