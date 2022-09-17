
{{--  Variáveis --}}
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Selecty System</title>

        <!-- Estilos Obrigatórios -->
        <link href="{{ asset('css/libs/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/libs/sweetalert2.min.css') }}" rel="stylesheet">

        @yield('css')    

    </head>

    <body id="page-top">

        <div id="wrapper">

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <!-- Conteúdo -->
                    <div class="container-fluid mt-5">

                        <!-- Cabeçalho -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">
                                <i class="fas fa-fw fa-user mr-1"></i> Cadastro 
                            </h1>   
                        </div>
                        
                        @yield('conteudo')

                    </div>

                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Selecty 2022</span>
                    </div>
                    </div>
                </footer>

            </div>

        </div>

        <!-- Scripts Obrigatórios -->
        <script src="{{ asset('js/libs/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('js/libs/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/libs/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('js/libs/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/libs/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/libs/bootstrap-datepicker-portugues.min.js') }}"></script>
        <script src="{{ asset('js/libs/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/libs/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/adm/template/index-show.js') }}"></script>    
        <script src="{{ asset('js/libs/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('js/libs/jquery-validate.min.js') }}"></script>
        <script src="{{ asset('js/libs/additional-methods.js') }}"></script>


        @yield('js')
    </body>
</html>