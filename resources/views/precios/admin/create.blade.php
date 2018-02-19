@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Paseo</h1>
		{!!Form::horizontal(['url'=>URL::route('precios.store'),'role'=>'form'])!!}
		@include('precios.admin.partials._form',['submit'=>'Crear Precio'])
		{!!Form::close()!!}

	</div>
@endsection

