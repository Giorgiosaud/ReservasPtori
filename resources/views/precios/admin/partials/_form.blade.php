{!!
	ControlGroup::generate(
	Form::label('tipo_de_paseo_id', 'Tipo de Paseo: '),
	Form::select('tipo_de_paseo_id',$tiposDePaseos,null,['class'=>'form-control']))
!!}

{!!
ControlGroup::generate(
Form::label('adulto', 'Precio Adultos: '),
Form::text('adulto')
)
!!}
{!!
		ControlGroup::generate(
		Form::label('mayor', 'Precio Mayores: '),
		Form::text('mayor')
		)
!!}
{!!
		ControlGroup::generate(
		Form::label('nino', 'Precio Niños: '),
		Form::text('nino')
		)
!!}

{!!	ControlGroup::generate(
	Form::label('aplicar_desde', 'Aplicar Desde: '),
	Form::text('aplicar_desde',null,['class'=>"datePicker"])
	)!!}
{!!Button::primary($submit)->large()->block()->submit()!!}
