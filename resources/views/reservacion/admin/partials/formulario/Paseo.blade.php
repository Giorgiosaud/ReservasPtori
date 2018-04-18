<div class="panel-heading">
	<h3>Datos del Paseo <span class="badge">Cupos Disponibles En Paseo sin esta reserva: <span id="cuposdisp">
		{!!$cuposDisponibles!!}</span></span></h3>
	</div>
	<div class="panel-body">
		<form action="{{route('modificarPaseo')}}" id="modificarPaseo" method="POST">
			{{csrf_field()}}
				<input type="hidden" name="_method" value="PUT" />
			
			<input type="hidden" name="disponibles" value="$cuposDisponibles">
			<input type="hidden" name="id" value="$reserva->id">
			<input type="hidden" name="modificadoPor" value="Auth::user()->nombre">
			<div class="control-group">
				<div class="form-group row">
					<label for="fecha" class="col-sm-2 col-form-label">fecha a Mostrar Embarcacion:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control datepicker" value="$reserva->fecha" name="fecha" id="fecha" placeholder="fecha">
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="form-group row">
					<label for="embarcacion_id" class="col-sm-2 col-form-label">embarcacion_id a Mostrar Embarcacion:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control datepicker" value="$reserva->embarcacion_id" name="embarcacion_id" id="embarcacion_id" placeholder="embarcacion_id">
					</div>
				</div>
			</div>
			
			<div class="control-group">
				
				<div class="form-group row">
					<label for="embarcacion_id" class="col-sm-2 col-form-label">Embarcacion:</label>
					<div class="col-sm-10">
						<select name="embarcacion_id" class="form-control"  id="embarcacion_id" >
							@foreach ($embarcaciones as $key=>$embarcacion)
							<option value="{{$key}}" @if($key===$reserva->embarcacion_id) selected @endif >{{$embarcacion}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="form-group row">
					<label for="embarcacion_id" class="col-sm-2 col-form-label">Paseo:</label>
					<div class="col-sm-10">
						<select name="paseo_id" class="form-control"  id="paseo_id" >
							@foreach ($embarcaciones as $key=>$paseo)
							<option value="{{$key}}" @if($key===$reserva->paseo_id)selected @endif >{{$paseo}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="control-group">
				<div class="form-group row">
					<label for="adultos" class="col-sm-2 col-form-label">Adultos:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="adultos" id="adultos" value="$reservacion->adultos"></input>
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="form-group row">
					<label for="mayores" class="col-sm-2 col-form-label">Mayores:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="mayores" id="mayores" value="$reservacion->mayores"></input>
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="form-group row">
					<label for="ninos" class="col-sm-2 col-form-label">Niños:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="ninos" id="ninos" value="$reservacion->ninos"></input>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="center-block text-center">
				<input type="reset" value="Borrar Cambios" "class"="btn btn-warning">
				<button type="submit" 'id'='modificarReserva' class="btn btn-success" >Modificar Info</button>
				
			</div>
		</form>
	</div>
	