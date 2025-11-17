<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = ['plant_id','time_harvest','weight_harvest',];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'id');
    }
}