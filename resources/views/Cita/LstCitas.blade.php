<div class="panel-heading">
    <center><b>CITAS PARA : {{ $fecha }}</b></center>
</div>
<!-- Formulario de Listado de Persona -->
{{ csrf_field() }}
@include('Cita.TablaCitas')