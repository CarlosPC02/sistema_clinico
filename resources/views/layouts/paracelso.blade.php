<!DOCTYPE html>
<!--LAYOUT PARA LA APP PARACELSO-->
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
    <!-- Loading Bootstrap Datetime-Picker-->
    {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
    <!-- Loading Flat UI / El CSS ya carga Fonts para el estilo-->
    {!! Html::style('css/flat-ui.css') !!}
    <!--Estilo Propio-->
    {!! Html::style('css/global.css') !!}
    <!-- Icono superior Paracelso -->
    <link rel="shortcut icon" href="{{asset('imagenes/favicon/favicon.ico')}}">

</head>

<body id="app-layout">
    
    <!-- Navegacion Superior-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <!--Brand-->
        <a class="navbar-brand" href="{{ url('/cita') }}">{{ Auth::user()->institucion->nombre }}</a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
            @else
                <li class="dropdown">
                    <a href="{{ url('/cita') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->UsuarioPersona->persona->nombre }} {{ Auth::user()->UsuarioPersona->persona->ap_paterno }} [ {{ Auth::user()->name }} ]<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/perfilusuario') }}">Mi perfil</a></li>
              <li><a href="{{ url('/reseteo') }}">Cambio de contrase&#241;a</a></li>
            </ul>
            </li>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Adm<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/institucion') }}">Instituciones</a></li>
              <li><a href="{{ url('/medico') }}">Medicos</a></li>
              <li><a href="{{ url('/usuario') }}">Usuarios</a></li>
            </ul>
            </li>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ayuda<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/faq') }}">Base de Conocimiento</a></li>
                <li><a href="{{ url('/tutorial') }}">Tutoriales</a></li>
                <li><a href="{{ url('/videotutorial') }}">Video Tutoriales</a></li>
                <li><a href="{{ url('/acerca') }}">Acerca de Paracelso</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/contacto') }}">Contactenos</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/sugerencia') }}">Comentarios/Sugerencias</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/privacidad') }}">Politica de Privacidad</a></li>
                <li><a href="{{ url('/terminouso') }}">Términos de uso</a></li>
                <!-- <li><a href="crear_paciente.html">Crear</a></li> -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid -->
      </nav>
      <!--Fin de navegacion superior paracelso-->

      <!--  Navegacion Lateral -->
      <div class="container">
        <div class="row">
          <div id="menu_lateral" class="col-md-1">
            <ul class="nav nav-pills nav-stacked" role="menu">
              <li role="presentation"> <a href="{{ url('/cita') }}" class="textomenu">
                <div class="puntero"> <span class="glyphicon fui-calendar icono_menu"></span>
                  <p class="textomenu">Ag. Citas</p>
                </div>
                </a>
              </li>

              <li role="presentation"> <a href="{{ url('/persona/show') }}" class="textomenu">
                <div class="puntero"> <span class="glyphicon fui-user icono_menu"></span>
                  <p class="textomenu">Pacientes</p>
                </div>
                </a></li>
              <li role="presentation"> <a href="#reporte" class="textomenu">
                <div class="puntero"> <span class="glyphicon fui-calendar-solid icono_menu"></span>
                  <p class="textomenu">Reportes</p>
                </div>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--  Fin Navegacion Lateral -->

    @yield('content')

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
      
    <!-- JavaScripts -->
    <script src="{{asset('js/application.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('js/vendor/jquery.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('js/flat-ui.min.js')}}"></script>

    <!-- JS busquedaCita -->
    <script type="text/javascript" src="{{ asset('js/BusquedaCita.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/BusquedaPersona.js')}}"></script>

    <!-- JS de datetimepicker -->
    <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{asset('js/locales/bootstrap-datetimepicker.es.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('js/ConfiguraFechaHora.js')}}"></script>

    <!-- JS combo dinamico -->
    <script type="text/javascript" src="{{asset('js/seguros.js')}}"></script>
    
    @yield('javascript')
    
</body>
</html>