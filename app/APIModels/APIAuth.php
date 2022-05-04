<?php

namespace App\APIModels;

class APIAuth extends GuzzleHttpRequest
{
    public function signIn($request)
    {
        return $this->post('/api/auth/login', $request);
    }

    public function signUp($request)
    {
        return $this->post('/api/auth/crear', $request);
    }
}