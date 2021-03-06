<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalPrize extends Model
{
    use HasFactory;

    protected $table = 'physical_prizes';

    /**
     * @var array
     */
    protected $fillable = [
        'object_id',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function userPrize()
    {
        return $this->morphOne(UserPrize::class, 'awarded');
    }

    public function physicalObject()
    {
        return $this->belongsTo(PhysicalObject::class, 'object_id');
    }
}
