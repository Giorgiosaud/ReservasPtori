@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {!!$TipoDePaseo->nombre!!}</h1>
		<form action="{{URL::route('tipoDePaseo.update',$TipoDePaseo->id)}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT" />
		@include('TiposDePaseos.admin.partials._form',['submit'=>'Modificar Paseo'])
		</form>
	</div>
@endsection