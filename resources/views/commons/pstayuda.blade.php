@extends('layouts.principal')

@section('content')

<div class="container-fluid">
        <h3>Centro de ayuda y soporte</h3>
        <br>
      <p>(Imagen persona ayuda)</p>
      <h4>Como podemos ayudarle?</h4>
      <input id="ayuda" type="ayuda" class="form-control" placeholder="Busque en la base de conocimiento de Paracelso..." autocomplete="off">   
        <br>
        
      <h4 style="text-align:center">Otras formas de ayudarle</h4>
        <ul>
            <li>Base de conocimiento</li>
            <li>Tutoriales</li>
            <li>Blog de consultas</li>
        </ul>
        <br>
        
      <h4><a href="#">Preguntas frecuentes:</a></h4>
      <p><i><a href="#">¿Como recupero mi contraseña?</a></i></p>
      <p><i><a href="#">¿Como desbloqueo mi cuenta?</a></i></p>
      <p><i><a href="#">¿Como registro un paciente?</a></i></p>
      <p><i><a href="#">¿Como obtengo copia de mis pacientes?</a></i></p>
        <br>
</div>

@endsection