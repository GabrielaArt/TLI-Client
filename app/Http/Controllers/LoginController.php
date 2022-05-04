<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIAuth;

class LoginController extends Controller
{
    public function __construct(APIAuth $auth)
	{
		$this->auth = $auth;
	}

    public function index()
    {
        return view('layouts.login');
    }

    //Register
    public function signUp(Request $request)
    {
        $data['nombre'] = $request->input('inpNombre');
        $data['primerApellido'] = $request->input('inpPrimeroAp');
        $data['segundoApellido'] = $request->input('inpSegundoAp');
        $data['mail'] = $request->input('inpEMail');
        $data['contrasenia'] = $request->input('inpPassword');
        $data['celular'] = $request->input('inpTelefono');

        $result = $this->auth->signUp(['json' => $data]);

        //
        if($result->status != 200){
            // return
        }

        session()->flash('success', 'Usuario creado con exito');  

        return view('layouts.login');
    }

    //Login
    public function signIn(Request $request)
    {
        $data['mail'] = $request->input('inpMail');
        $data['contrasenia'] = $request->input('inpPasswrd');

        $result = $this->auth->signIn(['json' => $data]);

        if($result->status != 200){
            return redirect()->route('/');
        }

        \Session::put('user', $result->message);

        return redirect()->route('sign.index');
    }
}
