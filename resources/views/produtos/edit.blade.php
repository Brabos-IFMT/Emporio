@extends('base')

@section('title', 'Produtos - Editar')

@section('content')

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">


      @if(session('sucesso'))
      <div>{{ session('sucesso') }}</div>
    @endif

      @if(session('erro'))
      <div>{{ session('erro') }}</div>
    @endif

      <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Editar Produto</h4>
        <form class="forms-sample" method="POST" action="{{ route('produtos.update', $produto) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
          <label for="exampleInputNome1">Nome</label>
          <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}"
            placeholder="Nome">
          @error('nome')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
          </div>

          <div class="form-group">
          <label for="exampleInputPreco">Preço</label>
          <input type="text" name="preco" class="form-control"
            value="{{ old('preco', number_format($produto->preco, 2, ',', '.')) }}" oninput="formatarPreco(this)"
            placeholder="R$ 0,00">
          @error('preco')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
          </div>

          <div class="form-group">
          <label>Quantidade</label>
          <input type="number" class="form-control" name="quantidade_estoque"
            value="{{ old('quantidade_estoque', $produto->quantidade_estoque) }}" placeholder="Quantidade">
          @error('quantidade_estoque')
        <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
          </div>

          <div class="form-group">
          <label for="valorTotal">Valor Total (Estimado)</label>
          <input type="text" class="form-control" id="valorTotal" readonly placeholder="R$ 0,00">
          </div>

          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
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
    function formatarPreco(input) {
    let valor = input.value.replace(/\D/g, '');
    valor = (valor / 100).toFixed(2) + '';
    valor = valor.replace(".", ",");
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    input.value = 'R$ ' + valor;

    calcularValorTotal();
    }

    document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('input[name="quantidade_estoque"]').addEventListener('input', calcularValorTotal);
    calcularValorTotal(); // inicializa com valores existentes
    });

    function calcularValorTotal() {
    let precoInput = document.querySelector('input[name="preco"]').value.replace(/\D/g, '');
    let preco = parseInt(precoInput || 0) / 100;
    let quantidade = parseInt(document.querySelector('input[name="quantidade_estoque"]').value) || 0;
    let total = preco * quantidade;

    document.getElementById('valorTotal').value = 'R$ ' + total.toFixed(2).replace(".", ",");
    }
  </script>

@endsection