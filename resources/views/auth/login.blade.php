@extends('layouts.principal')

@section('content')

<div class="container-fluid">
  <section id="fondo_login">
    	<div class="row">
        	<!-- espacio vacio lateral -->
            <div class="col-xs-6 col-sm-8 col-md-8"></div>
            
            <!-- definicion de formulario y espacio superior -->
            <div id="form_login" class="col-xs-6 col-sm-4 col-md-4 margenes2" style="margin-bottom:0px;">
            	<h4>Control de Acceso</h4>
                <form action="{{ url('/login') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>
						<div class="form-group">
							<label for="name" class="control-label col-xs-3 col-sm-4 col-md-4">Usuario:</label>
							    <div class="col-xs-7 col-sm-6 col-md-6">
                    <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
						</div>
                        
            <div class="form-group">
							<label for="password" class="control-label col-xs-3 col-sm-4 col-md-4">Contrase&#241;a:</label>
							<div class="col-xs-7 col-sm-6 col-md-6">
							<input id="password" type="password" class="form-control" name="password">
							</div>
						</div>
            <div class="form-group">
							<div class="col-xs-7 col-sm-6 col-md-6 col-xs-offset-3 col-sm-offset-4 col-md-offset-4">
								<!-- <a href="../par_solucion/menu.html" target="new"> -->
								<p><a href="{{ url('/forgot') }}"><small>Olvido su Contrase&#241;a?</small></a></p>
                <button type="submit" class="btn btn-success">Ingresar</button>
							</div>				
						</div>
                 </fieldset>
                 </form>
            </div>
        </div>

        <div class="row margenes1">        	
        </div>    
  </section>    
</div>
@endsection