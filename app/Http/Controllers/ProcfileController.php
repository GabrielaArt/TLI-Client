<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIProcfile;
use App\APIModels\APIPublicacion;

class ProcfileController extends Controller
{
    //
    public function __construct(APIProcfile $procfile, APIPublicacion $publication)
	{
        $this->procfile = $procfile;
        $this->publication = $publication;
        
	}

    public function index()
    {   
        $idUsuario = \Session::get('user');
        $data['_id'] = $idUsuario->_id;

        // //Obtener la info del perfil
        $perfil = $this->procfile->read(['json' => $data]);
        $perfil = $perfil->message;

        // //Obtener sus publicaciones
        $publicaciones = $this->publication->readByProcfile(['json' => $data]);
        $publicaciones = $publicaciones->message;

        //Modificar Usuario del array [publicaciones]
        for($i=0; $i < count($publicaciones); $i++){
            $publicaciones[$i]->Usuario = $idUsuario;
        }

        return view('layouts.Procfile', compact('perfil', 'publicaciones'));
    }
}
