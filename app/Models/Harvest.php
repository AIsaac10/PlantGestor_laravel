<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = ['culture_id', 'culture', 'time_harvest', 'weight_harvest'];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'culture_id');
    }
}