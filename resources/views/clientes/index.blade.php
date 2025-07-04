@extends('base')

@section('title', 'Clientes')

@section('content')

      <!-- Conteúdo principal -->
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

            

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clientes as $cliente)
                    <tr>
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

        <!-- partial -->
      </div>

      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
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

        @endif

    </script> 
</body>
  
</html>

<!-- <script>
  function confirmarExclusao(form) {
    return confirm('Tem certeza que deseja excluir este cliente?');
  }
</script> -->
@endsection