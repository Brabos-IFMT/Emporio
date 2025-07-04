@extends('base')

@section('title', 'Produtos - Empório')

@section('content')

  <!-- FIM - BARRA LATERAL -->
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title m-0">Meus Produtos</h4>
          <a href="{{ route('produtos.create') }}" class="btn btn-info">
          Adicionar
          </a>
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
          <thead>
            <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade de Estoque </th>
            <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($produtos as $produto)
        <tr>
        <td>{{$produto->id_produto}}</td>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->preco}}</td>
        <td>{{$produto->quantidade_estoque}}</td>
        <td>
          <a class="btn btn-info" href="{{ route('produtos.edit', $produto) }}">
          Editar
          </a>
          <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;"
          onsubmit="return confirmarExclusao(this)">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Excluir</button>
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

  <script>
    function confirmarExclusao(form) {
    return confirm('Tem certeza que deseja excluir este produto?');
    }
  </script>


@endsection