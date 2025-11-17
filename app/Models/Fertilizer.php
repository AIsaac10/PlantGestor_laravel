<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    protected $fillable = ['plant_id','fertilizer','time_fertilizer','weight_fertilizer'];

        public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'id');
    }
}
