@extends('templates.mainInterno')
@section('content')
<div class="container">
	<div class="row">
		@foreach($TiposDepaseosTableStyle[1] as $index=>$key)
		<div class="col">
			{{$index}}
		</div>
		@endforeach
		
	</div>
	@foreach($TiposDepaseosTableStyle as $tipoDePaseo)
	<div class="row">
		@foreach ($tipoDePaseo as $item )
		<div class="col text-left">
			{{$item}}
		</div>		
		@endforeach
		<div class="col">
			<a href="{{route('tipoDePaseo.edit', $tipoDePaseo['Id'])}}" class="btn btn-primary">Editar</a>
		</div>
		<div class="col">
			<form action="{{route('tipoDePaseo.destroy', $tipoDePaseo['Id'])}}" method="POST">    
				<input type="hidden" name="_method" value="delete" />
				{!! csrf_field() !!}
				<button class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
	@endforeach
	<a href="{{route('tipoDePaseo.create')}}"class="btn primary" >Nuevo Tipo de Paseo</a>
</div>
@endsection
