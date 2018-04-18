@extends('templates.mainInterno')
@section('content')
@include('templates.errors')
<div class="container">
	<h1>Crear Embarcacion</h1>
	<form action="{{URL::route('embarcaciones.store')}}">
		{{csrf_field()}}
	@include('embarcaciones.admin.partials._form',['submit'=>'Crear Embarcacion'])
	</form>
	
</div>
@endsection