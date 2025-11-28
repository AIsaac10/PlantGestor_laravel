<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ["culture", 'user_id'];

public function harvests()
{
    return $this->hasMany(Harvest::class, 'plant_id');
}

public function fertilizers()
{
    return $this->hasMany(Fertilizer::class, 'plant_id');
}
}
