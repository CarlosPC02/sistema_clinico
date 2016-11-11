{{ csrf_field() }}
<div class="form-group" id='detalle_seguros' name='detalle_seguros'>
	<label class="control-label">Tipo Seguro</label>
		<div class="selectContainer" id="seguros" name="seguros">
			<select class="form-control" id="codigo_seguro" name="codigo_seguro">
			@foreach ($seguros as $seguro)
            	<option value="{{ $seguro->nombre}}">{{ $seguro->nombre}}</option>
            @endforeach  
			</select>
	    </div>
</div>