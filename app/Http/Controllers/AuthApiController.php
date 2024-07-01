<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthApiRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{

    use ApiResponses;

    public function login(AuthApiRequest $request)
    {
        return $this->ok($request->get('email'));
    }
}
