<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Harvest extends Model
{
    protected $fillable = ['plant_id', 'time_harvest', 'weight_harvest'];

    protected $casts = [
        'time_harvest' => 'date',
    ];

    public function getTimeHarvestFormattedAttribute()
    {
        return $this->time_harvest
            ? $this->time_harvest->format('d/m/Y')
            : null;
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'id');
    }
}