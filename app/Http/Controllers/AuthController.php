<?php

namespace App\Http\Controllers;

use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function connect()
    {
        return MsGraph::connect();
    }

    public function logout()
    {
        return MsGraph::disconnect('/');
    }
}
