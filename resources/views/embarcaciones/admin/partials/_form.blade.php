{!!
		ControlGroup::generate(
		Form::label('nombre', 'Nombre de la Embarcacion: '),
		Form::text('nombre')
		)
		!!}
{!!
ControlGroup::generate(
Form::label('orden', 'Orden a Mostrar Embarcacion: '),
Form::text('orden')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeMinimo', 'Minimo de Personas para Abordar: '),
Form::text('abordajeMinimo')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeNormal', 'Cupos Publico en General Disponibles para Reservar: '),
Form::text('abordajeNormal')
)
!!}
{!!
ControlGroup::generate(
Form::label('abordajeMaximo', 'Maximo posible para Reservar: '),
Form::text('abordajeMaximo')
)
!!}
<div class="pretty p-switch p-slim p-svg p-pulse">
	{!!Form::hidden('publico',0)!!}
	{!! Form::checkbox('publico',1,null,['class'=>'btswitch']) !!}

	<div class="state p-success">
		<label id="publico">Embarcacion de uso Público</label>
	</div>
</div>
<h2>Dias Disponibles a la Semana</h2>
<div class="form-group">

	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('lunes',0)!!}
		{!! Form::checkbox('lunes',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Lunes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('martes',0)!!}
		{!! Form::checkbox('martes',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Martes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('miercoles',0)!!}
		{!! Form::checkbox('miercoles',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Miercoles</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('jueves',0)!!}
		{!! Form::checkbox('jueves',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Jueves</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('viernes',0)!!}
		{!! Form::checkbox('viernes',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Viernes</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('sabado',0)!!}
		{!! Form::checkbox('sabado',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Sábado</label>
		</div>
	</div>
	<div class="pretty p-switch p-slim p-svg p-pulse">
		{!!Form::hidden('domingo',0)!!}
		{!! Form::checkbox('domingo',1,null,['class'=>'btswitch']) !!}

		<div class="state p-success">
			<label>Domingo</label>
		</div>
	</div>

	{!!Button::primary($submit)->large()->block()->submit()!!}

</div>
