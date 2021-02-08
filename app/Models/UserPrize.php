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
        'awarded_type',
        'details',
        'status'
    ];

    public function awarded()
    {
        return $this->morphTo();
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

    public function history()
    {
        return $this->hasMany(UserPrizeHistory::class, 'prize_id');
    }
}
