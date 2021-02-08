<?php


namespace App\Http\Controllers;


use App\Events\GeneratePrize;
use App\Models\Game;

class PrizesController extends Controller
{
    public function get()
    {
        $user = \Auth::user();
        $game = Game::get()[0];

        GeneratePrize::dispatch($game, $user);

        return redirect()->route('prizes.list');
    }

    public function index()
    {
        $user = \Auth::user();

        $prizes = $user->prizes;

        return view('prizes.list', ['prizes' => $prizes]);
    }
}
