@extends('templates.mainInterno')
@section('content')
<div class="container">
	<div class="row">
		@foreach($embarcacionesTableStyle[1] as $index=>$key)
		<div class="col">
			{{$index}}
		</div>
		@endforeach
		
	</div>
	@foreach($embarcacionesTableStyle as $embarcacion)
	<div class="row">
		@foreach ($embarcacion as $item )
		<div class="col text-left">
			{{$item}}
		</div>		
		@endforeach
		<div class="col">
			<a href="{{route('embarcaciones.edit', $embarcacion['Id'])}}" class="btn btn-primary">Editar</a>
		</div>
		<div class="col">
			<form action="{{route('embarcaciones.destroy', $embarcacion['Id'])}}" method="POST">    
				<input type="hidden" name="_method" value="delete" />
				{!! csrf_field() !!}
				<button class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
	@endforeach
</div>
	<a href="{{route('embarcaciones.create')}}"class="btn primary" >Nuevo Tipo de Paseo</a>

</div>
