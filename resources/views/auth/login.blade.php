<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Login</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block" 
                    style="background: url({{ asset('img/login.jpg') }});  
                    background-position: center; 
                    background-size: cover;"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                    <img src="{{ asset('img/logo.jpg') }}" 
                        style="width: 70%; margin-left: 16%; margin-bottom: 40px;">


                    @isset($url)
                        <form class="user" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                        <form class="user" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset   
                        
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control-user form-control" 
                            name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" 
                            class="form-control-user form-control" 
                            name="password" placeholder="Senha" required>
                        </div>
                        @if (count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red;">
                                        <strong>{{ $error }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Manter-me Conectado</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Logar"/>
                            
                        </form>
                        <section style="visibility: hidden;">
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            
                            <span style="display: none;">
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </span>
                        </section>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>

    </div>

    </body>

</html>
