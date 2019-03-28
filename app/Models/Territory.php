<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    protected $table = 't_koatuu_tree';
    protected $primaryKey = 'ter_id';

    /* Solution for string primary key */
    public $incrementing = false;

    const LEVEL_1 = 1;
    const LEVEL_2 = 2;
    const LEVEL_3 = 3;
    const LEVEL_4 = 4;

    public function scopeRegion($query)
    {
        return $query->where('ter_level', self::LEVEL_1);
    }

    public function scopeCity($query)
    {
        return $query->where('ter_level', self::LEVEL_2);
    }

    public function scopeDistrict($query)
    {
        return $query->whereIn('ter_level', [self::LEVEL_3, self::LEVEL_4]);
    }

    public function nested()
    {
        return $this->hasMany(Territory::class, 'ter_pid', 'ter_id');
    }
}
