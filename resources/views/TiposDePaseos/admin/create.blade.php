@extends('templates.mainInterno')
@section('content')
@include('templates.errors')
<div class="container">
	<h1>Crear Tipo de Paseo</h1>
	<form action="{{URL::route('tipoDePaseo.store')}}">
		{{csrf_field()}}
		@include('TiposDePaseos.admin.partials._form',['submit'=>'Crear Tipo de Paseo'])
	</form>
	
</div>
@endsection