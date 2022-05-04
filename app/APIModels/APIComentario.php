<?php

namespace App\APIModels;

class APIComentario extends GuzzleHttpRequest
{
    public function read($id)
    {
        return $this->post('/api/comentario/leer',$id);
    }
}