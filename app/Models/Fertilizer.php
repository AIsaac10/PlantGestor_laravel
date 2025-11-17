<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    protected $fillable = ['plant_id','fertilizer','time_fertilizer','weight_fertilizer',
    ];

    protected $casts = [
        'time_fertilizer' => 'date',
    ];

    public function getTimeFertilizerFormattedAttribute()
    {
        return $this->time_fertilizer
            ? $this->time_fertilizer->format('d/m/Y')
            : null;
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'id');
    }
}