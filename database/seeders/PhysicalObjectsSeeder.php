<?php


namespace Database\Seeders;


use App\Models\Game;
use App\Models\PhysicalObject;
use Illuminate\Database\Seeder;

class PhysicalObjectsSeeder extends Seeder
{
    public function run()
    {
        $games = Game::all()->sortBy('id');
        $game = null;
        if (count($games) > 0) {
            $game = $games[0];
            PhysicalObject::create([
                'title' => 'prize001',
                'amount' => 2,
                'game_id' => $game->id
            ]);
            PhysicalObject::create([
                'title' => 'prize002',
                'amount' => 1,
                'game_id' => $game->id
            ]);
            PhysicalObject::create([
                'title' => 'prize003',
                'amount' => 1,
                'game_id' => $game->id
            ]);
        }
    }
}
