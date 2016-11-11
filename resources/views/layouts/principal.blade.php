<!DOCTYPE html>
<!--PAGINA NUMERO UNO DE PARACELSO-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Plataforma de asistencia para médicos y especialistas que apoya en la atención de pacientes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plataforma Paracelso</title>

    <!-- Fonts -->

   <!-- Styles -->
    <!-- RESET -->
    {!! Html::style('css/reset.css') !!}
    <!-- Loading Bootstrap -->
    {!! Html::style('css/vendor/bootstrap/css/bootstrap.min.css') !!}
    <!-- Loading Flat UI / El CSS ya carga Fonts para el estilo-->
    {!! Html::style('css/flat-ui.css') !!}
    <!--Estilo Propio-->
    {!! Html::style('css/global.css') !!}
    <!-- Icono superior Paracelso -->
    <link rel="shortcut icon" href="{{asset('imagenes/favicon/favicon.ico')}}">
    
</head>
<body id="app-layout">
    <!-- Navegacion externa basica -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    TIMNet Bolivia
                </a>
            </div>

            <div class="navbar-collapse collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="{{ url('pstsolucion') }}">Soluciones</a></li>
                    <li><a href="{{ url('pstempresa') }}">Empresa</a></li>
                    <li><a href="{{ url('pstayuda') }}">Ayuda</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="{{ url('lstcalendario') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!--Fin de navegacion-->

    <!-- Definicion de Footer Paracelso -->
    <footer>
      <div class="footer" style="float:left; padding-top:15px;"> 
        <div class="container">
            <p><span class="fui-location"> </span> Edif. CES, Of. #204, Obraje calle 6, La Paz - Bolivia</p>
            <p><span class="fui-chat"> </span> (+591) 720 00301 / (+591) 673 13333</p>
            <p><span class="fui-mail"> </span>gerencia@timnetbo.com / soporte@timnetbo.com</p>
        </div>
       </div>
       
       <!-- Se deden definir los iconos sociales a la derecha y derechos reservados por debajo -->
   </footer>
   <!-- Final de Footer -->


    @yield('content')

    <!-- JavaScripts -->
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('js/vendor/jquery.min.js')}}"  crossorigin="anonymous"></script>
    
    
    <script src="{{asset('js/flat-ui.min.js')}}"></script>
    <script src="{{asset('js/application.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>