@extends('layouts.principal')

@section('content')
<!--PAGINA DE BIENVENIDA PARA USUARIO NO AUTENTIFICADO PUBLICO-->
<div class="container-fluid" id="wrapper">
    
    <!-- Carrusel -->
   <div id="carousel1" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#carousel1" data-slide-to="0" class="active"></li>
       <li data-target="#carousel1" data-slide-to="1"></li>
       <li data-target="#carousel1" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner" role="listbox">
       <div class="item active"><img src="imagenes/carr1.jpg" alt="First slide image" class="center-block">
         <div class="carousel-caption">
           <h3>Plataforma Paracelso</h3>
           <p>Soluciones Medicas para el dia de hoy</p>
         </div>
       </div>
       <div class="item"><img src="imagenes/carr2.jpg" alt="Second slide image" class="center-block">
         <div class="carousel-caption">
           <h3>Second slide Heading</h3>
           <p>Second slide Caption</p>
         </div>
       </div>
       <div class="item"><img src="imagenes/carr3.jpg" alt="Third slide image" class="center-block">
         <div class="carousel-caption">
           <h3>Third slide Heading</h3>
           <p>Third slide Caption</p>
         </div>
       </div>
     </div>
     <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
    <!-- Fin de Carrusel -->
</div>
@endsection
