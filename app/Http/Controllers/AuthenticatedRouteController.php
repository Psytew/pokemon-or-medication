<?php

namespace App\Http\Controllers;

use App\user;
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

    public function roundTest(User $user){
        return view('roundTest', compact('user'));
    }
}
