@extends('base')

@section('title', 'Área de Trabalho')

@section('content')

      <!-- INÍCIO - CONTEÚDO DA PÁGINA -->
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
            <!-- Coluna da esquerda -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg h-100">
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

            <!-- Coluna da direita com 4 cards -->
            <div class="col-md-6 grid-margin d-flex flex-column">
              <div class="row flex-grow">
                <div class="col-md-6 mb-4 stretch-card">
                  <div class="card card-tale h-100">
                    <div class="card-body">
                      <p class="mb-4">Vendas do Dia</p>
                      <p class="fs-30 mb-2">{{ $vendasDoDia }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card">
                  <div class="card card-dark-blue h-100">
                    <div class="card-body">
                      <p class="mb-4">Total de Vendas</p>
                      <p class="fs-30 mb-2">{{ $totalVendas }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card">
                  <div class="card card-light-blue h-100">
                    <div class="card-body">
                      <p class="mb-4">Total de produtos vendidos</p>
                      <p class="fs-30 mb-2">{{ $totalProdutosVendidos }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card">
                  <div class="card card-light-danger h-100">
                    <div class="card-body">
                      <p class="mb-4">Total de Clientes</p>
                      <p class="fs-30 mb-2">{{ $totalClientes }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Relatório de Vendas -->
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Relatório de Vendas</h4>
                  <p class="card-text">Total de Vendas: {{ $totalVendas }}</p>
                  <p class="card-text">Receita Total: R$ {{ number_format($receitaTotal, 2, ',', '.') }}</p>
                  <h5>Top Produtos Vendidos</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Receita</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($topProdutos as $produto)
              <tr>
              <td>{{ $produto->nome }}</td>
              <td>{{ $produto->quantidade_vendida }}</td>
              <td>R$ {{ number_format($produto->receita, 2, ',', '.') }}</td>
              </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">


            <!-- Relatório de Movimentação de Estoque -->
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Movimentação de Estoque</h4>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Produto</th>
                        <th>Quantidade em Estoque</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($produtos as $produto)
                  <tr>
                  <td>{{ $produto->nome }}</td>
                  <td>{{ $produto->quantidade_estoque }}</td>
                  <td>
                    @if($produto->quantidade_estoque < 10)
              <span class="badge badge-danger">Baixo</span>
              @else
              <span class="badge badge-success">Normal</span>
              @endif
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
      <!-- FIM - CONTEÚDO DA PÁGINA -->
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('table').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": false,
        "language": {
          "decimal": ",",
          "thousands": ".",
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Pesquisar:",
          "sUrl": "",
          "sInfoThousands": ".",
          "sLoadingRecords": "Carregando...",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sLast": "Último",
            "sNext": "Próximo",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
    });
  </script>
  <script>

    var graficoVendasCanvas = $("#graficoVendas").get(0).getContext("2d");

    var VendasChart = new Chart(graficoVendasCanvas, {
      type: 'bar',
      data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
          label: 'Vendas',
          data: {!! json_encode($data) !!},
          backgroundColor: '#4B49AC'
        }]
      },
      options: {
        cornerRadius: 5,
        responsive: true,
        maintainAspectRatio: true,
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 20,
            bottom: 0
          }
        },
        scales: {
          yAxes: [{
            display: true,
            gridLines: {
              display: true,
              drawBorder: false,
              color: "#F2F2F2"
            },
            ticks: {
              display: true,
              beginAtZero: true,
              callback: function (value) {
                return value + ' vendas';
              },
              autoSkip: true,
              maxTicksLimit: 10,
              fontColor: "#6C7383"
            }
          }],
          xAxes: [{
            stacked: false,
            ticks: {
              beginAtZero: true,
              fontColor: "#6C7383"
            },
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
              display: false
            },
            barPercentage: 1
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
  </script>
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
  @endif
  </script>

@endsection