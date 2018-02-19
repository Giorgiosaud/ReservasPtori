{!!
Navbar::top()
->setType('navbar-puertorinoco')
->fluid()
->withBrand('<img class="logoNav" src="'.''.'"/>', '#')
->withContent(
	Navigation::links(
		[
			[
				'link' => URL::route('inicio.index'),
				'title' => 'Inicio'
			],
			[
				'link' => URL::route('loginPanel'),
				'title' => 'Panel Administrativo'
			],
		]
	)
)
!!}