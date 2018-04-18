@extends('templates.mainInterno')
@section('content')
@include('templates.errors')
<div class="container">
	<h1>Editar {!!$embarcacion->nombre!!}</h1>
	<form action="{{URL::route('embarcaciones.update',$embarcacion->id)}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT" />
		@include('embarcaciones.admin.partials._form',['submit'=>'Modificar Embarcacion'])
	</form>
</div>
@endsection