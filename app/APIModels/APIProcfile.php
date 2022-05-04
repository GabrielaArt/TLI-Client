<?php

namespace App\APIModels;

class APIProcfile extends GuzzleHttpRequest
{
    public function read($id)
    {
        return $this->put('/api/usuario/consultar', $id);
    }
}