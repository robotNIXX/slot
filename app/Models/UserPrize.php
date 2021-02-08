<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrize extends Model
{
    use HasFactory;

    protected $table = 'user_prizes';

    /**
     * @var array
     */
    protected $fillable = [
        'game_id',
        'user_id',
        'awarded_id',
        'awarder_type',
        'details'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function cashPrizes()
    {
        return $this->morphToMany(CashPrize::class, 'awarded');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function bonusPrizes()
    {
        return $this->morphToMany(BonusPrize::class, 'awarded');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function physicalPrizes()
    {
        return $this->morphToMany(PhysicalPrize::class, 'awarded');
    }

    /**
     * Game
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    /**
     * User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
