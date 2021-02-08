<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    /**
     * @var array
     */
    protected $fillable = [
        'physical_prizes_amount',
        'cash_prizes_amount',
        'min_cash_prize',
        'max_cash_prize',
        'min_bonus_prize',
        'max_bonus_prize',
    ];

    public function prizes()
    {
        return $this->hasMany(UserPrize::class, 'game_id');
    }

    public function physicalPrizes()
    {
        return $this->hasManyThrough(PhysicalPrize::class, PhysicalObject::class, 'id', 'object_id');
    }
}
