@extends('base')

@section('title', 'Produtos - Cadastro')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                

                @if(session('succeso'))
                  <div >{{ session('sucesso') }}</div>
                @endif

                @if(session('erro'))
                  <div >{{ session('erro') }}</div>
                @endif

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
           <div class="card-body">
                <h4 class="card-title">Cadastro de Produtos</h4>
                <form class="forms-sample" method="POST" action="{{ route('produtos.store') }}">
                    @csrf

                    <div class="form-group">
                    <label for="exampleInputNome1">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome"
                            value="{{ old('nome') }}">
                    @error('nome')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPreco">Preço</label>
                    <input type="text" id="preco" name="preco" class="form-control"
                            placeholder="R$ 0,00" oninput="formatarPreco(this)"
                            value="{{ old('preco') }}">
                    @error('preco')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                    <label for="exampleInputQuantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade_estoque"
                            placeholder="Quantidade" value="{{ old('quantidade_estoque') }}">
                    @error('quantidade_estoque')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
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
  function formatarPreco(input) {
    let valor = input.value.replace(/\D/g, '');
    valor = (valor / 100).toFixed(2) + '';
    valor = valor.replace(".", ",");
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    input.value = 'R$ ' + valor;

    calcularValorTotal();
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('input[name="quantidade_estoque"]').addEventListener('input', calcularValorTotal);
  });

  function calcularValorTotal() {
    let precoInput = document.getElementById('preco').value.replace(/\D/g, '');
    let preco = parseInt(precoInput || 0) / 100;
    let quantidade = parseInt(document.querySelector('input[name="quantidade_estoque"]').value) || 0;
    let total = preco * quantidade;

    document.getElementById('valorTotal').value = 'R$ ' + total.toFixed(2).replace(".", ",");
  }
</script>

@endsection