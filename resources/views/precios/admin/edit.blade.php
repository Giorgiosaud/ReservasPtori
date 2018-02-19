@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {{$precio->id}}</h1>
		{!!Form::horizontalModel($precio,['url'=>URL::route('precios.update',$precio->id),'role'=>'form','method'=>'PUT'])!!}
		@include('precios.admin.partials._form',['submit'=>'Modificar Precio'])
		{!!Form::close()!!}
	</div>
@endsection