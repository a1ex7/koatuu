<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    protected $fillable = [
        'name',
        'email',
        'territory_id'
    ];

    public function territory()
    {
        return $this->belongsTo(Territory::class, 'territory_id', 'ter_id');
    }
}
