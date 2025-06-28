
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Emporio Seu Prozo</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('images/logo-h.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg') }}" width="15rem" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
  
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Produtos</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                @if(session('erro'))
        <p style="color: red">{{ session('erro') }}</p>
    @endif

    @if(session('sucesso'))
        <p style="color: green">{{ session('sucesso') }}</p>
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
                    <input type="text" name="nome" class="form-control"
                        value="{{ old('nome', $produto->nome) }}" placeholder="Nome">
                    @error('nome')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPreco">Preço</label>
                    <input type="text" name="preco" class="form-control"
                        value="{{ old('preco', number_format($produto->preco, 2, ',', '.')) }}"
                        oninput="formatarPreco(this)" placeholder="R$ 0,00">
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.<a href="https://www.bootstrapdash.com/" target="_blank">Grupo Bravos TI</a></span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
</body>

</html>

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