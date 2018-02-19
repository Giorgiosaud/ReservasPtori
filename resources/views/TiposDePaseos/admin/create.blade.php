@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Tipo de Paseo</h1>
		{!!Form::horizontal(['url'=>URL::route('tipoDePaseo.store'),'role'=>'form'])!!}
		@include('TiposDePaseos.admin.partials._form',['submit'=>'Crear Tipo de Paseo'])
		{!!Form::close()!!}

	</div>
@endsection