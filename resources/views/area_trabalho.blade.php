
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tela de Início</title>
  <!-- plugins:css -->
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
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>

  <div class="container-scroller">
    
    
    <!-- partial:partials/_navbar.html -->

    <!-- INÍCIO - BARRA SUPERIOR -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('area_trabalho') }}"><!-- URL CORRIGIR ROTA - ME EXCLUA! --><img src="images/logo-h.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('area_trabalho') }}"><!-- URL CORRIGIR ROTA - ME EXCLUA! --><img src="images/logo-mini.svg" height="15rem" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <!-- Foto do Usuário -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><!-- ME EXCLUA OU NÃO | URL CORRIGIR ROTA -->
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              @if(session('usuario'))
              <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout/Sair
              </button>
              </form>
              @endif
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- FIM - BARRA SUPERIOR -->


    <!-- partial -->
     <!-- INÍCIO - BARRA LATERAL -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('area_trabalho') }}"> <!-- URL CORRIGIR ROTA - ME EXCLUA! -->
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Página Inicial</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Usuário</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('registro.form') }}"> Criar Usuário </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('vendas.index') }}"> <!-- URL CORRIGIR ROTA - ME EXCLUA! -->
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Vendas</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('produtos.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Produtos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientes.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Clientes</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('vendas.create') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">PDV</span>
            </a>
          </li>

          <!-- OPÇÃO DE TRATAMENTO DE ERRO DE URL -->
           <!--
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Páginas de Erro</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          -->

        </ul>
      </nav>
      <!-- FIM - BARRA LATERAL -->



      <!-- INÍCIO - CONTEÚDO DA PÁGINA -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bem-Vindo, {{ session('usuario')->nome }}!</h3>
                  <h6 class="font-weight-normal mb-0">Estou pronto para mais um lindo dia.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>46<sup>ºC</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Cuiabá</h4>
                        <h6 class="font-weight-normal">Mato Grosso</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          
            

        <!-- FIM - CONTEÚDO DA PÁGINA -->


        <!-- INÍCIO - RODAPÉ -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">

          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. TSI - Brabos. Todos os direitos Reservados.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Disciplina: Oficina de Prática Extensionista I</span>
          </div>

          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Diogo, Guilherme, Leandro, Valéria, Pytagoras, Wilker e Yuri</a></span> 
          </div>

          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Instituo Federal de Mato Grosso - <a href="https://cba.ifmt.edu.br" target="_blank">Cel. Octayde jorge da Silva</a></span> 
          </div>

        </footer> 
        <!-- FIM - RODAPÉ -->


        <!-- partial -->
      </div>

      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>