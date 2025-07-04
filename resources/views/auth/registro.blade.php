<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Criar Cadastro</title>
  <!-- plugins:css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>Novo Usuário?</h4>
              <h6 class="font-weight-light">Criar uma conta é rápido e simples</h6>

             

              <!-- Formulário de Registro -->
              <form class="pt-3" method="POST" action="{{ route('registrar.usuario') }}">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="nome" name="nome" required placeholder="Usuário">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="login" name="login" required placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="senha" name="senha" required placeholder="Senha">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Eu aceito todos Termos & Condições.
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Criar Conta</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Pronto para entrar? <a href="{{ route('login.form') }}" class="text-primary">Fazer Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
  <!-- endinject -->
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
</body>

</html>