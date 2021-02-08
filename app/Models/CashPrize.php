<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPrize extends Model
{
    use HasFactory;

    protected $table = 'cash_prizes';

    /**
     * @var array
     */
    protected $fillable = [
        'game_id',
        'sum',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */

    public function userPrize()
    {
        return $this->morphToMany(UserPrize::class, 'awarded');
    }
}
