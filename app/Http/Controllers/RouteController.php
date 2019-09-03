<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        return view('welcome');
    }

    public function freePlay(){
        return view('free-play');
    }

    public function roundTest(User $user){
        return view('roundTest', compact('user'));
    }

    public function hordeBattle(){
        return view('hordeBattle');
    }

    public function leaderboard(){
        $users = User::all();
        return view('leaderboard', compact('users'));
    }

    public function storeScore(Request $request, User $user){
        $user = User::findOrFail(request('userid'));
        if ($user->highscore < request('score')){
            $user->highscore = request('score');
            $user->save();
        }
    }
}
