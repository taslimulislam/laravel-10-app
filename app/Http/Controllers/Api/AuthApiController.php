<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\APi\LoginUserRequest;
use App\Http\Requests\AuthApiRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Auth;

class AuthApiController extends Controller
{

    use ApiResponses;

    public function login(LoginUserRequest $request)
    {
        // return 123;
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invelid Credentials', 401); //401 for unauthorized

        }
        $user = User::firstWhere('email', $request->email);

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken('Api token for ' . $user->email)->plainTextToken
            ]
        );
    }
}
