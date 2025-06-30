@extends('base')

@section('title', 'Vendas')

@section('content')
  <div class="conten_venda">
    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
      <div class="card-body">
        <p class="card-title mb-0">Histórico de Vendas</p>
        <div class="pt-3">
        <div class="table-responsive">
          <table class="table table-striped table-borderless">
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
          <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST"
          style="display:inline;">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger"
          onclick="return confirm('Excluir venda?')">Excluir</button>
          </form>
        </td>
        </tr>
        @endforeach
          </tbody>
          </table>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    @if(session('toast'))
    @if(session('sucesso'))
    Toastify({
    text: "{{ session('sucesso') }}",
    duration: 3000,
    gravity: "top",
    position: "left",
    stopOnFocus: true,
    style: {
      background: "#77DD77",
    }
    }).showToast();
    @endif

    @if(session('erro'))
    Toastify({
    text: "{{ session('erro') }}",
    duration: 3000,
    gravity: "top",
    position: "left",
    stopOnFocus: true,
    style: {
      background: "#FF6961",
    }
    }).showToast();
    @endif
    @endif
  </script>
@endsection