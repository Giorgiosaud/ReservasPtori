<div class="panel-heading"><h3>Datos del Cliente <span class="badge">Id Cliente:
	{!!$reserva->cliente->id!!}</span></h3>
</div>
<div class="panel-body">
	<form action="{{route('modificarCliente')}}" id="datosDecliente" method="POST">
		{{csrf_field()}}
				<input type="hidden" name="_method" value="PUT" />
		
		<input type="hidden" name="id" value="$reserva->cliente->id">
		<input type="hidden" name="reservacion_id" value="$reserva->id">	
		
		<div class="control-group">
			<div class="form-group row">
				<label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nombre" id="nombre" value="$reserva->cliente->nombre"></input>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="form-group row">
				<label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="apellido" id="apellido" value="$reserva->cliente->apellido"></input>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Identificacion:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="identificacion" id="identificacion" value="$reserva->cliente->apellido"></input>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" id="email" value="$reserva->cliente->email"></input>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="form-group row">
				<label for="telefono" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="telefono" id="telefono" value="$reserva->cliente->telefono"></input>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="form-group row">
				<label for="credito" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="credito" id="credito" value="$reserva->cliente->credito"></input>
				</div>
			</div>
		</div>
		<div class="text-center">
			<input type="reset" value="Borrar Cambios" "class"="btn btn-danger">
			<button type="submit" class="btn btn-primary">Modificar Info</button>
			
		</div>
	</form>				
</div>
