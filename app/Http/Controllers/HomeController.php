<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIPublicacion;
use App\Http\Controllers\CommentController;

class HomeController extends Controller
{
    public function __construct(APIPublicacion $publicacion, CommentController $comment)
	{
		$this->publicacion = $publicacion;
        $this->comment = $comment;
	}

    //
    public function index()
    {
        //Publicacion
        $publicaciones = $this->publicacion->read();
        $publicaciones = $publicaciones->message;

        return view('layouts.Home', compact('publicaciones'));
    }
}
