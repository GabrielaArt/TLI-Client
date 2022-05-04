<?php

namespace App\APIModels;

class APIPublicacion extends GuzzleHttpRequest
{
    public function read()
    {
        return $this->get('/api/publicacion/leer');
    }

    public function readByProcfile($request)
    {
        return $this->put('/api/publicacion/leerByUsuario', $request);
    }
}