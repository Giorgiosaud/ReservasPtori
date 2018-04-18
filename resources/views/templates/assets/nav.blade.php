<nav class="navbar navbar-expand fixed-top navbar-light bg-light">
	<a class="navbar-brand" href="#"><img class="logoNav" src="{{Vari::get('logo')}}"/></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{URL::route('inicio.index')}}">Inicio</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="{{URL::route('loginPanel')}}">Panel Administrativo</a>
			</li>
		</ul>
	</div>
</nav>
