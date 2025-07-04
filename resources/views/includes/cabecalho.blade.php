
    <!-- INÍCIO - BARRA SUPERIOR -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('area_trabalho') }}"><!-- URL CORRIGIR ROTA - ME EXCLUA! --><img src="{{ asset('images/logo-h.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('area_trabalho') }}"><!-- URL CORRIGIR ROTA - ME EXCLUA! --><img src="{{ asset('images/logo-mini.svg') }}" height="15rem" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <!-- Foto do Usuário -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><!-- ME EXCLUA OU NÃO | URL CORRIGIR ROTA -->
              <img src="{{ asset('images/faces/face28.jpg') }}" alt="profile"/>
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