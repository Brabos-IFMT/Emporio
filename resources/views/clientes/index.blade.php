<!-- resources/views/clientes/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Emporio Seu Prozo - Clientes</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    
    <div class="container-fluid page-body-wrapper">
     
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title m-0">Meus Clientes</h4>
                    <a href="{{ route('clientes.create') }}" class="btn btn-info">
                      Adicionar
                    </a>
                  </div>

                  @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                  @endif

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nome</th>
                          <th>Email</th>
                          <th>Telefone</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($clientes as $cliente)
                          <tr>
                            <td>{{ $cliente->id_cliente }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>
                              <a class="btn btn-info" href="{{ route('clientes.edit', $cliente->id_cliente) }}">
                                Editar
                              </a>
                              <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;" onsubmit="return confirmarExclusao(this)">
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. <a href="#" target="_blank">Grupo Bravos TI</a></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script>
    function confirmarExclusao(form) {
      return confirm('Tem certeza que deseja excluir este cliente?');
    }
  </script>
</body>
</html>
