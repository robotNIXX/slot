<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrizeHistory extends Model
{
    use HasFactory;

    protected $table = 'user_prize_history';

    /**
     * @var array
     */
    protected $fillable = [
        'prize_id',
        'status'
    ];
}
