
<h2>Nova Venda</h2>

<form action="{{ route('vendas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ old('descricao') }}">
    </div>

    <div class="form-group">
        <label>Data</label>
        <input type="date" name="data" class="form-control" value="{{ old('data', now()->toDateString()) }}">
    </div>

    <div class="form-group">
        <label>Valor Total</label>
        <input type="text" name="valor" class="form-control" value="{{ old('valor') }}">
    </div>

    <div class="form-group">
        <label>Cliente</label>
        <select name="id_cliente" class="form-control">
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>
    </div>

   

    <h4 class="mt-4">Produtos</h4>
    <div id="produtos-wrapper">
        <div class="produto-group mb-2">
            <select name="produtos[0][id_produto]" class="form-control d-inline-block w-25">
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>
                @endforeach
            </select>

            <input type="text" name="produtos[0][preco_unitario]" placeholder="Preço" class="form-control d-inline-block w-25">
            <input type="number" name="produtos[0][quantidade]" placeholder="Qtd" class="form-control d-inline-block w-25">
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Salvar</button>
</form>
