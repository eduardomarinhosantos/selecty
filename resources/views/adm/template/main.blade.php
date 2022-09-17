
{{--  Variáveis --}}
@php
    $modulo = explode('.', Route::current()->getName())[0];
    $view   = explode('.', Route::current()->getName())[1];
    if(isset(explode('/', Request::url())[4])) $id = explode('/', Request::url())[4]; 
@endphp
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

        <!-- Estilos por View-->
        @if($view == 'index' || $view == 'show')
            <link href="{{ asset('css/libs/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        @endif

        @yield('css')    

    </head>

    <body id="page-top">

        <div id="wrapper">

            <!-- Menu -->
            @include('adm.template.menu')

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <!-- Topbar -->
                    @include('adm.template.topbar')

                    <!-- Conteúdo -->
                    <div class="container-fluid">

                        <!-- Cabeçalho -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">
                                                                     
                                @switch($modulo)

                                    @case('candidato') 
                                        <i class="fas fa-fw fa-users mr-1"></i>
                                        @if($view == 'index') Candidatos
                                        @elseif($view == 'create') {{ 'Novo Registro' }}
                                        @else {{ $candidato->nome }}
                                        @endif
                                        @break

                                    @case('experienciaprofissional') 
                                        <i class="fas fa-fw fa-building mr-1"></i>
                                         {{ $experienciaprofissional->empresa }}
                                        @break
                                        
                                @endswitch                                       
                                
                            </h1>                           
                                <div class="float-right">

                                @if($modulo != 'experienciaprofissional' && $modulo != 'formacaoacademica' )

                                    @if( $view == 'show' || $view == 'edit' || $view == 'create')
                                        <a href="{{ route($modulo.'.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-list fa-sm text-white-50"></i> Listar Registros
                                        </a>
                                    @endif
                                    
                                    @if( $view == 'show')
                                        <a href="{{ route($modulo.'.edit', $id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-pencil-alt fa-sm text-white-50"></i> Editar Registro
                                        </a>
                                    @endif
                                    
                                    <!-- @if( $view == 'index' || $view == 'edit' || $view == 'show')
                                        <a href="{{ route($modulo.'.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-plus fa-sm text-white-50"></i> Novo Registro
                                        </a>
                                    @endif -->
                                @endif
                                </div>
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

        <!-- Scripts por View-->
        @if($view == 'index' || $view == 'show')
            <script src="{{ asset('js/libs/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('js/libs/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('js/adm/template/index-show.js') }}"></script>
         @endif
        
        @if($view == 'edit' || $view == 'create')
            <script src="{{ asset('js/libs/jquery.mask.min.js') }}"></script>
            <script src="{{ asset('js/libs/jquery-validate.min.js') }}"></script>
            <script src="{{ asset('js/libs/additional-methods.js') }}"></script>
        @endif

        @if($view == 'create')
            <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
        @endif

        @yield('js')
    </body>
</html>