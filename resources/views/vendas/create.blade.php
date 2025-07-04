<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro de Venda</title>
  <!-- plugins:css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
  <!-- End plugin css for this page -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  <style>
    body,
    html {
      height: 100%;
      margin: 5px;
      padding: 0;
      background: #f5f5f5;
    }
  </style>
</head>

<body>
  <div class="layout_venda">
    <nav class="sidebar_intern">

      <div class="row">
        <div class="col">
          <a class="brand-logo-mini" href="{{ route('area_trabalho') }}"> <!-- URL CORRIGIR ROTA - ME EXCLUA! --> <img src="{{ asset('images/logo-mini.svg') }} " width="50px" alt="logo" /></a>

        </div>
        <div class="col">
          <h6>Usuário: {{ session('usuario')->nome }}</h6>
        </div>
      </div>

      <h4 class="card-title mt-2">Realizar Nova Venda</h4>
      <form class="forms-sample" action="{{ route('vendas.store') }}" method="POST" onsubmit="return confirmarFinalizacao()">
        @csrf
        <div class="form-group">
          <label class="font-weight-bold">Cliente</label>
          <select class="js-example-basic-single w-100" name="id_cliente">
            @foreach ($clientes as $cliente)
              <option value="{{ $cliente->id_cliente }}"
                {{ old('id_cliente', session('vendaForm.id_cliente')) == $cliente->id_cliente ? 'selected' : '' }}>
                {{ $cliente->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Descrição</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2" name="descricao">{{ old('descricao', session('vendaForm.descricao')) }}</textarea>
        </div>

        <div class="form-group">
          <input type="date" class="form-control" placeholder="Data" name="data"
            value="{{ old('data', session('vendaForm.data', now()->toDateString())) }}" min="{{ now()->toDateString() }}">
        </div>
        <div class="form-group">
          <label>Produto</label>
          <select class="js-example-basic-single w-100" id="id_produto">
            @foreach ($produtos as $produto)
            <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <div class="form-group col">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-success text-white">R$</span>
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text">00,00</span>
              </div>
            </div>
          </div>

          <div class="form-grou col">
            <input type="number" id="quantidade" placeholder="Quantidade" class="form-control" min="1">
          </div>
        </div>

        <div class="form-group">
          <label class="mr-2">Valor Total</label>

          <div class="input-group mr-2 d-flex">
            <div class="input-group-prepend">
              <span class="input-group-text bg-success text-white">R$</span>
            </div>
            <span class="input-group-text" style="flex: 1;">{{ $totalValorFormatado }}</span>
          </div>
        </div>
        <div class="d-flex mb-5">
          <button type="button" class="btn btn-info mr-2" onclick="registrarProduto()">REGISTRAR</button>
          <button type="button" class="btn btn-danger mr-2" onclick="enviarFormulario('formLimpar')">LIMPAR</button>
        </div>

        <div>
          <button type="submit" class="btn btn-success col">FINALIZAR VENDA</button>
        </div>
      </form>
    </nav>
    <!-- Form oculto: REGISTRAR PRODUTO -->
    <form id="formRegistrar" method="POST" action="{{ route('pdv.adicionar') }}" style="display: none;">
      @csrf
      <input type="hidden" name="produto_id" id="hiddenProdutoId">
      <input type="hidden" name="quantidade" id="hiddenQuantidade">

      <input type="hidden" name="id_cliente" id="hiddenClienteId">
      <input type="hidden" name="data" id="hiddenData">
      <input type="hidden" name="descricao" id="hiddenDescricao">
    </form>

    <!-- Form oculto: LIMPAR CARRINHO -->
    <form id="formLimpar" method="POST" action="{{ route('pdv.limpar') }}" style="display: none;">
      @csrf
    </form>
    <div class="conten_venda">

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Produtos</p>
              <div class="pt-3">
                <div class="table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($vendaProdutos as $vendaProduto)
                        <tr>
                            <td>{{ $vendaProduto["id_produto"] }}</td>
                            <td>{{ $vendaProduto["nome"] }}</td>
                            <td>{{ $vendaProduto["preco"] }}</td>
                            <td>{{ $vendaProduto["quantidade"] }}</td>
                            <td>
                                <form action="{{ route('pdv.removerProduto', $vendaProduto["id_produto"]) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Remover este produto?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </div>
                </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/typeahead.js') }}"></script>
  <script src="{{ asset('js/select2.js') }}"></script>
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

  <script>
    function enviarFormulario(id) {
      if (confirm('Tem certeza que deseja continuar com esta ação?')) {
        const form = document.getElementById(id);
        if (form) {
          form.submit();
        }
      }
    }

    function registrarProduto() {
      const produtoId = document.getElementById('id_produto').value;
      const quantidade = document.getElementById('quantidade').value;

      if (!produtoId || quantidade <= 0) {
        alert("Selecione um produto e informe uma quantidade válida.");
        return;
      }

      const clienteSelect = document.querySelector('select[name="id_cliente"]');
      const clienteId = clienteSelect ? clienteSelect.value : '';
      
      const dataInput = document.querySelector('input[name="data"]');
      const data = dataInput ? dataInput.value : '';

      const descricaoInput = document.querySelector('textarea[name="descricao"]');
      const descricao = descricaoInput ? descricaoInput.value : '';

      document.getElementById('hiddenProdutoId').value = produtoId;
      document.getElementById('hiddenQuantidade').value = quantidade;
      document.getElementById('hiddenClienteId').value = clienteId;
      document.getElementById('hiddenData').value = data;
      document.getElementById('hiddenDescricao').value = descricao;

      document.getElementById('formRegistrar').submit();
    }

    function confirmarFinalizacao() {
      return confirm('Tem certeza que deseja finalizar a venda?');
    }
  </script>

</body>

</html>