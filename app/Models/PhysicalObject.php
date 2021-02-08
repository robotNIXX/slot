<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalObject extends Model
{
    use HasFactory;

    protected $table = 'physical_objects';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'amount',
        'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
