@extends('layouts.paracelso')
@section('content')

    <div class="container" style="padding-top: 70px;">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h6>Datos Persona</h6>
            <p class="navbar-text navbar-right" style="margin-top: -35px;"><button class="btn btn-info navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" onclick="document.location.href='{{ url('/persona/show') }}'">Volver</button></p>
        </div>
        
        <div class="panel-body">
            @foreach ($persona as $persona)
            <center>{{ $persona->nombre." ".$persona->ap_paterno." ".$persona->ap_materno}}</center>
                {{ csrf_field() }}
                                    
                    <label for="documento_identidad" class="col-sm-3 control-label">Documento Identidad</label>
                    <div class="col-sm-6">
                         {{ $persona->documento_identidad}}
                    </div>
                                
                    <label for="tipo_documento" class="col-sm-3 control-label">Tipo Documento</label>
                    <div class="col-sm-6">
                        {{ $persona->tipo_documento}}
                    </div>
                
                    
                    <label for="telefono" class="col-sm-3 control-label">Telefono</label>
                    <div class="col-sm-6">
                        {{$persona->no_telefono}}
                    </div>
                
                    
                    <label for="celular" class="col-sm-3 control-label">Celular</label>
                    <div class="col-sm-6">
                        {{$persona->no_celular}}
                    </div>
                
                    
                    <label for="email" class="col-sm-3 control-label">email</label>
                    <div class="col-sm-6">
                        {{$persona->email}}
                    </div>
                
                    
                    <label for="direccion" class="col-sm-3 control-label">Direccion</label>
                    <div class="col-sm-6">
                        {{$persona->direccion}}
                    </div>
                
                    @foreach ($imagenpersona as $imagenpersona)
                    <label for="imagen" class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-6">
                        <img src="{{print($imagenpersona->imagen)}}" alt="foto">
                    </div>
                    @endforeach
            @endforeach 
        </div>

    </div>
    </div>
    
   
 @endsection