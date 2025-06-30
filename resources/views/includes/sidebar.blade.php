<!-- INÍCIO - BARRA LATERAL -->
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