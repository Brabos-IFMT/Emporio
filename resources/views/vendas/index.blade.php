<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro de Venda</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./../../../public/vendors/feather/feather.css">
  <link rel="stylesheet" href="./../../../public/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./../../../public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./../../../public/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./../../../public/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../../../public/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./../../../public/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="./../../../public/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <link rel="shortcut icon" href="./../../../public/images/favicon.png" />
  <style>
    body, html {
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
      <a class="brand-logo-mini" href="index.html"> <!-- URL CORRIGIR ROTA - ME EXCLUA! --> <img src="images/logo-mini.svg" width="50px" alt="logo"/></a>
        </div>
        <div class="col"> <h6>{{ session('usuario')->nome }}</h6> </div>
        </div>

      <h4 class="card-title mt-2">Realizar Nova Venda</h4>
      <form class="forms-sample" action="{{ route('vendas.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="font-weight-bold">Cliente</label>
          <select class="js-example-basic-single w-100" name="id_cliente">
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descrição</label>
          <textarea class="form-control" id="exampleTextarea1" rows="2" name="descricao" value="{{ old('descricao') }}"></textarea>
        </div>
        <div class="form-group">
          <input type="date" class="form-control" placeholder="Data" name="data" value="{{ old('data', now()->toDateString()) }}">
        </div>
        <div class="form-group">
          <label>Produto</label>
          <select class="js-example-basic-single w-100" name="produtos[0][id_produto]">
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
        <div class="form-group col">
          <div class="input-group">
            <div class="input-group-prepend">
              <input type="text" name="produtos[0][preco_unitario]" placeholder="Preço" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="form-grou col">
          <input type="number" name="produtos[0][quantidade]" placeholder="Quantidade" class="form-control">
        </div>
        </div>

        <div class="form-group">
        <label>Valor Total</label>
        <input type="text" name="valor" class="form-control" value="{{ old('valor') }}">
        </div>

        

        <button type="submit" class="btn btn-info mr-2">REGISTRAR</button>
        <button type="reset" class="btn btn-secondary">LIMPAR</button>
      </form>
    </nav>
    <div class="conten_venda">
      
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Vendas</p>
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
                                
                                <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir venda?')">Excluir</button>
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
  <script src="./../../../public/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./../../../public/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="./../../../public/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./../../../public/vendors/chart.js/Chart.min.js"></script>
  <script src="./../../../public/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="./../../../public/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

