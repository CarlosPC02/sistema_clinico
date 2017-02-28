<div class="container-fluid paciente_encontrado">
      
      <div class="thumb_paciente" style="float: left;"><img src="" class="img-responsive" alt="S/I"></div>
      <h6 class="texto_paciente_encontrado"> {{session('nombre_persona')}}  | <small>F.Nac: {{session('fecha_nacimiento')}}</small></h6>
      
      <!-- <p class="navbar-text navbar-right" style="margin-top: -50px;">
      <button class="btn btn-info navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" onclick="document.location.href='{ route('persona.edit',session('id_persona')) }}'">Detalles</button>
      </p> -->

      <h6 class="texto_thumb_paciente"><a href=""><span class="fui-image"></span> Editar imagen </a>  |  <a href={{ route('persona.edit',session('id_persona')) }}> <span class="fui-new"></span> Ver Detalles </a></h6>
      <!-- <p>
      <button class="btn btn-success navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" >Editar Imagen</button>
      </p> -->

</div>