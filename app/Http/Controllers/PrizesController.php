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

        return view('prizes.select');
    }
}
