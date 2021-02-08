<?php


namespace Database\Seeders;


use App\Models\Game;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    public function run()
    {
        Game::create([
            'physical_prizes_amount' => 4,
            'cash_prizes_amount' => 15,
            'min_cash_prize' => 100,
            'max_cash_prize' => 10000,
            'min_bonus_prize' => 15000,
            'max_bonus_prize' => 30000
        ]);
    }
}
