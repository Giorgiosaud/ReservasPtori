{!!
Navbar::top()
->setType('navbar-puertorinoco')
->fluid()
->withBrand('<img class="logoNav" src="'.Vari::get('logo').'"/>', '#')
->withContent(
	Navigation::links(
		[
			[
					'link' => URL::route('loginPanel'),
					'title' => 'Inicio'
				],
			['Configuracion',
			[

				[
					'link' => URL::route('embarcaciones.index'),
					'title' => 'Embarcaciones'
				],
				[
					'link' => URL::route('tipoDePaseo.index'),
					'title' => 'Tipos De Paseos'
				],
				[
					'link' => URL::route('paseos.index'),
					'title' => 'Paseos'
				],
				[
					'link' => URL::route('fechasEspeciales.index'),
					'title' => 'Fechas Especiales'
				],
				[
					'link' => URL::route('precios.index'),
					'title' => 'Precios'
				],
				[
					'link' => URL::route('variables.index'),
					'title' => 'Variables'
				],
			]
			],
			['Reservas',
			[
				[
					'link'=>URL::route('formularioDeConsultaDeReserva'),
					'title'=>'Consultar'
				],
				//[
				//	'link'=>URL::route('formularioDeConsultaDeAbordaje'),
				//	'title'=>'Abordaje'
				//],

			]
			],
		]
	)
)
->withContent(
	Navigation::links(
		[
			[
				'link'=>URL::route('logout'),
				'title'=>'Desconectarse',
			],
		]
	)->right()
)
!!}