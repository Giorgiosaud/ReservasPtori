<nav class="navbar navbar-expand fixed-top navbar-light bg-light">
	<a class="navbar-brand" href="#"><img class="logoNav" src="{{Vari::get('logo')}}"/></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{URL::route('loginPanel')}}">Inicio</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="setupDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Configuracion
				</a>
				<div class="dropdown-menu" aria-labelledby="setupDropdown">
					<a class="dropdown-item" href="{{URL::route('embarcaciones.index')}}">Embarcaciones</a>
					<a class="dropdown-item" href="{{URL::route('tipoDePaseo.index')}}">Tipos de Paseos</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{URL::route('paseos.index')}}">Paseos</a>
					<a class="dropdown-item" href="{{URL::route('fechasEspeciales.index')}}">Fechas Especiales</a>
					<a class="dropdown-item" href="{{URL::route('precios.index')}}">Precios</a>
					<a class="dropdown-item" href="{{URL::route('variables.index')}}">Variables</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{URL::route('formularioDeConsultaDeReserva')}}">Reservas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{URL::route('logout')}}">Desconectarse</a>
			</li>
		</ul>
	</div>
</nav>