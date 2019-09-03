<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedRouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myscores(){
        return view('myscores');
    }
}
