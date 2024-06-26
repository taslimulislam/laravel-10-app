<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class TestApiController extends Controller
{

    use ApiResponses;

    public function index()
    {
        return $this->ok('Hello Laravel data');
    }
}
