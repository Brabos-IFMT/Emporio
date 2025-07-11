<!-- in resources/views/base.blade.php -->

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Empório - @yield('title')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">

        
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
            <div class="container-fluid page-body-wrapper">

        <!-- NAVBAR SUPERIOR -->
         @section('cabecalho')
            @include('includes.cabecalho')
        @show


        <!-- SIDEBAR -->
        @section('sidebar')
            @include('includes.sidebar')
        @show


        <!-- CONTEÚDO DA PÁGINA -->
            @yield('content')
    

            </div>
        <!-- RODAPÉ -->
        @section('footer')
            @include('includes.footer')
        @show
        <!-- container-scroller -->
            
        </div>

        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

        
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('js/dataTables.select.min.js') }}"></script>


        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/settings.js') }}"></script>
        <script src="{{ asset('js/todolist.js') }}"></script>

        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    </body>
</html>