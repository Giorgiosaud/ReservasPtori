<div class="control-group">
	<div class="form-group row">
		<label for="nombre" class="col-sm-2 col-form-label">Nombre de la Embarcacion:</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
		</div>
	</div>
</div>
<div class="control-group">
	<div class="form-group row">
		<label for="orden" class="col-sm-2 col-form-label">Orden a Mostrar Embarcacion:</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="orden" id="orden" placeholder="Orden">
		</div>
	</div>
</div>
<div class="control-group">
	<div class="form-group row">
		<label for="abordajeMinimo" class="col-sm-2 col-form-label">Minimo de Personas para Abordar:</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="abordajeMinimo" id="abordajeMinimo" placeholder="Abordaje Minimo">
		</div>
	</div>
</div>
<div class="control-group">
	<div class="form-group row">
		<label for="abordajeNormal" class="col-sm-2 col-form-label">Cupos Publico en General Disponibles para Reservar:</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="abordajeNormal" id="abordajeNormal" placeholder="Abordaje Normal">
		</div>
	</div>
</div>
<div class="control-group">
	<div class="form-group row">
		<label for="abordajeMaximo" class="col-sm-2 col-form-label">Maximo posible para Reservar:</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="abordajeMaximo" id="abordajeMaximo" placeholder="Abordaje Minimo">
		</div>
	</div>
</div>
<div class="pretty p-switch p-slim p-svg p-pulse">
	<input type="hidden" name="publico" value="0">
	<input type="checkbox" name="publico" id="publico" name="publico" class="btswitch">
	<div class="state p-success">
		<label id="publico">Embarcacion de uso Público</label>
	</div>
</div>
<h2>Dias Disponibles a la Semana</h2>
<div class="form-group">
	
	<div class="pretty p-switch p-slim p-svg p-pulse">
	<input type="hidden" name="lunes" value="0">
	<input type="checkbox" name="lunes" id="lunes" name="lunes" class="btswitch" value="{{old('lunes')}}">
		<div class="state p-success">
			<label>Lunes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
			<input type="hidden" name="martes" value="0">
	<input type="checkbox" name="martes" id="martes" name="martes" class="btswitch" value="{{old('martes')}}">

		
		<div class="state p-success">
			<label>Martes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		<input type="hidden" name="miercoles" value="0">
	<input type="checkbox" name="miercoles" id="miercoles" name="miercoles" class="btswitch" value="{{old('miercoles')}}">
		<div class="state p-success">
			<label>Miercoles</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
				<input type="hidden" name="jueves" value="0">
	<input type="checkbox" name="jueves" id="jueves" name="jueves" class="btswitch" value="{{old('jueves')}}">

		
		<div class="state p-success">
			<label>Jueves</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		<input type="hidden" name="viernes" value="0">
	<input type="checkbox" name="viernes" id="viernes" name="viernes" class="btswitch" value="{{old('viernes')}}">
		
		<div class="state p-success">
			<label>Viernes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		<input type="hidden" name="sabado" value="0">
	<input type="checkbox" name="sabado" id="sabado" name="sabado" class="btswitch" value="{{old('sabado')}}">
		<div class="state p-success">
			<label>Sábado</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		<input type="hidden" name="domingo" value="0">
	<input type="checkbox" name="domingo" id="domingo" name="domingo" class="btswitch" value="{{old('domingo')}}">
		<div class="state p-success">
			<label>Domingo</label>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">{{$submit}}</button>
	
</div>
