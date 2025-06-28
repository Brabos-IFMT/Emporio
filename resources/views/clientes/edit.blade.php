<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Empório Seu Prozo</title>
  <!-- Estilos -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{ asset('images/logo-h.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('images/logo-mini.svg') }}" width="15rem" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientes.index') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Clientes</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Conteúdo -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container">
              <h2>Editar Cliente</h2>

              <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="nome" value="{{ old('nome', $cliente->nome) }}">
                      @error('nome')
                          <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email', $cliente->email) }}">
                      @error('email')
                          <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="telefone">Telefone</label>
                      <input type="text" class="form-control" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">
                      @error('telefone')
                          <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
          </div>
        </div>

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              © 2025 <a href="https://www.bootstrapdash.com/" target="_blank">Grupo Bravos TI</a>
            </span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
</body>

</html>
