@extends('base')

@section('title', 'Vendas')

@section('content')

  <!-- Conteúdo principal -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title m-0">Histórico de Vendas</h4>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
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