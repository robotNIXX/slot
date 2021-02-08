<?php


namespace App\Http\Controllers;


class PrizesController extends Controller
{
    public function get()
    {

        return view('prizes.select');
    }
}
