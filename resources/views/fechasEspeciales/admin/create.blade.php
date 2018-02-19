@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Paseo</h1>
		{!!Form::horizontal(['url'=>URL::route('fechasEspeciales.store'),'role'=>'form'])!!}
		@include('fechasEspeciales.admin.partials._form',['submit'=>'Crear Fecha Especial'])
		{!!Form::close()!!}

	</div>
@endsection