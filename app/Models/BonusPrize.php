<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusPrize extends Model
{
    use HasFactory;

    protected $table = 'bonus_prizes';

    /**
     * @var array
     */
    protected $fillable = [
        'game_id',
        'sum',
        'cash_prize_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function userPrize()
    {
        return $this->morphMany(UserPrize::class, 'awarded');
    }
}
