@extends('layouts.paracelso')
@section('title','MENU DE TRABAJO')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid titulo_general">
   <h6 id="titulo_principal">Menu de Trabajo</h6>
</div>

<div class="container-fluid marco_trabajo">

    <div>@include('Persona.LstDatosBasicos')</div>
    @if($resultado === 0)
        <div class="alert alert-warning alerta_small">
            <p><small><span class="fui-question-circle"></span> Datos importantes incompletos. <a href="{{ route('paciente.edit',session('id_persona')) }}" style="color: #FFBF00;">Completar...</a></small></p>
            <!-- <p class="navbar-text navbar-right" style="margin-top: -35px;"><button class="btn btn-warning navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" onclick="document.location.href='{{ route('paciente.edit',session('id_persona')) }}'">Completar Ahora</button></p> -->
        </div>
    @else
        <div class="alert alert-success alerta_small">
            <p><small><span class="fui-check-circle"></span> Datos completos</small></p>
        </div>
    @endif

    <!-- Boton Signos Vitales -->
    <div class="cuadro_menu_paciente"> <a href={{ route('medicion.show',session('id_persona')) }}>
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/gabinete_w.png') }}" alt="Signos Vitales"></div>
        <h3 class="titulo_menu">Signos Vitales</h3>
        <div class="texto_menu"><p><small>Mediciones importantes del Paciente</small></p></div>
        </a>
    </div>

    <!-- Boton Historia Clinica -->
    <div class="cuadro_menu_paciente"> <a href="{{ route('historia.show',session('id_paciente')) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/expediente_w.png') }}" alt="Historia"></div>
        <h3 class="titulo_menu">Historia Clinica</h3>
        <div class="texto_menu"><p><small>Antecedentes del Paciente</small></p></div>
        </a>
    </div>

    <!-- Boton Consulta -->
    <div class="cuadro_menu_paciente"> <a href="{{ route('consulta.show',session('id_paciente')) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estetoscopio_w.png') }}" alt="Consulta"></div>
        <h3 class="titulo_menu">Consulta</h3>
        <div class="texto_menu"><p><small>Administracion de Consultas</small></p></div>
        </a>
    </div>

    <!-- Boton Laboratorio -->
    <div class="cuadro_menu_paciente"> <a href="{{ route('ordenesL.show',session('id_paciente')) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/microscopio_w.png') }}" alt="Laboratorio"></div>
        <h3 class="titulo_menu">Laboratorio</h3>
        <div class="texto_menu"><p><small>Resultados de Laboratorios</small></p></div>
        </a>
    </div>
    
    <!-- Boton Gabinete -->
    <div class="cuadro_menu_paciente"> <a href="{{ route('ordenesG.show',session('id_paciente')) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/enfermera_w.png') }}" alt="Gabinete"></div>
        <h3 class="titulo_menu">Gabinete</h3>
        <div class="texto_menu"><p><small>Administracion de Imagenología</small></p></div>
        </a>
    </div>
    
    <!-- Boton Quirofano -->
    <div class="cuadro_menu_paciente"> <a href="#">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/quirofano_w.png') }}" alt="Quirofano"></div>
        <h3 class="titulo_menu">Quirofano</h3>
        <div class="texto_menu"><p><small>Programacion de Quirofano</small></p></div>
        </a>
    </div>
    
    <div class="cuadro_menu_paciente"> <a href="#">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estadisticas_w.png') }}" alt="Otros"></div>
        <h3 class="titulo_menu">Estadisticas</h3>
        <div class="texto_menu"><p><small>Estasdisticas referidas al paciente</small></p></div>
        </a>
    </div>
</div>

	
@endsection