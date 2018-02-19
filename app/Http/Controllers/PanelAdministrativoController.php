<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticacionRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;

/**
 * Class PanelAdministrativoController
 * @package App\Http\Controllers
 */
class PanelAdministrativoController extends Controller
{
    /**
     * PanelAdministrativoController constructor.
     * @param Guard $auth
     * @param Registrar $registrar
     */
    function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostrarFormularioEntrada()
    {
        if ($this->auth->guest())
        {
            return view('auth.login');
        }

        return view('PanelAdministrativo.inicio');
    }

    /**
     * @return mixed
     */
    protected function getFailedLoginMessage()
    {
        return \Lang::get('formulario.credencialesNoCoinciden');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (!$this->auth->guest())
        {
            $this->auth->logout();
        }

        return redirect()->route('loginPanel');
    }

    /**
     * @param AutenticacionRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function validarAcceso(AutenticacionRequest $request)
    {
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';

        $request->merge([$field => $request->input('login')]);
        $request->all();
        if ($this->auth->attempt($request->only($field, 'password')))
        {
            return redirect()->intended(route('loginPanel'));
        }

        return redirect()->route('loginPanel')->withErrors([
            'error' => $this->getFailedLoginMessage(),
        ]);
    }
}
